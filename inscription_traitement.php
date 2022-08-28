<?php 
	session_start(); 
 
	use PHPMailer\PHPMailer\PHPMailer; 
	use PHPMailer\PHPMailer\SMTP; 
	use PHPMailer\PHPMailer\Exception; 
 
	// Inclure le fichier de configuration 
	require_once 'bdd.php'; 
 
	// Définir les variables et initialiser avec des valeurs vides 
	$mail_ok = $nom = $prenom = $email = $password = $confirm_password = $captcha = ""; 
	$mail_error = $nom_err = $prenom_err = $email_err = $password_err = $confirm_password_err = $captcha_err = ""; 
	$cle = md5(microtime(TRUE)*100000); //Génération de la clé aléatoire; 
 
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 
		//Valider le prénom 
		if(empty(trim($_POST["prenom"]))){ 
		  $prenom_err = "Veuillez entrer votre prénom"; 
		} else { 
			$prenom = trim($_POST["prenom"]); 
		} 
	 
		//Valider le nom 
		if(empty(trim($_POST["nom"]))){ 
		  $nom_err = "Veuillez entrer votre nom"; 
		} else { 
			$nom = trim($_POST["nom"]); 
		} 
 
		//Valider le captcha 
		if(empty(trim($_POST["captcha"]))){ 
			$captcha_err = "Veuillez entrer le captcha"; 
		} elseif($_SESSION["captcha"]!=$_POST["captcha"]){ 
			$captcha_err = "Captcha incorrect"; 
		} else { 
			$captcha = trim($_POST["captcha"]); 
		} 
	 
		//Valider l'email 
		if(empty(trim($_POST["email"]))){ 
		  $email_err = "Veuillez entrer un email"; 
		} elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
		  $email_err = "Email invalide"; 
		}else{ 
			// Préparer une déclaration sélective 
			$sql = "SELECT id FROM utilisateurs WHERE email = :email"; 
	 
			if($stmt = $conn->prepare($sql)){ 
				// Lier des variables à la déclaration préparée en tant que paramètres 
				$stmt->bindParam(":email", $param_email, PDO::PARAM_STR); 
	 
				// Définir les paramètres 
				$param_email = trim($_POST["email"]); 
	 
				// Tentative d'exécution de la déclaration préparée 
				if($stmt->execute()){ 
					if($stmt->rowCount() == 1){ 
						$email_err = "Cet email est déjà pris."; 
					} else{ 
						$email = trim($_POST["email"]); 
					} 
				} else{ 
					echo "Désolé, il y a eu une erreur. Veuillez réessayer ultérieurement."; 
				} 
	 
				// Fermer la déclaration 
				unset($stmt); 
			} 
		} 
 
		// Valider le mot de passe 
		if(empty(trim($_POST["password"]))){ 
			$password_err = "Veuillez entrer un mot de passe."; 
		} elseif(strlen(trim($_POST["password"])) < 6){ 
			$password_err = "Le mot de passe doit au moins faire 6 caractères."; 
		} else{ 
			$password = trim($_POST["password"]); 
		} 
	 
		// Valider la confirmation de mot de passe 
		if(empty(trim($_POST["confirm_password"]))){ 
			$confirm_password_err = "Veuillez confirmer le mot de passe."; 
		}else{ 
			$confirm_password = trim($_POST["confirm_password"]); 
			if(empty($password_err) && ($password != $confirm_password)){ 
				$confirm_password_err = "Les mots de passe ne correspondent pas."; 
			} 
		}  
		 
		$mot_de_passe = hash('sha256', $password); 
		$creer_a = date('d-m-Y H:i:s'); 
 
		// Vérifier les erreurs de saisie avant d'insérer dans la base de données 
   		 if(empty($password_err) && empty($confirm_password_err) && empty($nom_err) && empty($prenom_err) && empty($email_err) && empty($captcha_err)){ 
				// Prépararer l'insertion de la déclaration 
				$sql = "INSERT INTO utilisateurs (nom, prenom, mot_de_passe, email, creer_a, cle, actif) VALUES (:nom, :prenom, :mot_de_passe, :email, :creer_a, :cle, :actif)"; 
				if($stmt = $conn->prepare($sql)){ 
		   
					// Lier des variables à la déclaration préparée en tant que paramètres 
					  $stmt->bindParam(":mot_de_passe", $param_password, PDO::PARAM_STR); 
					  $stmt->bindParam(":prenom", $param_prenom, PDO::PARAM_STR); 
					  $stmt->bindParam(":nom", $param_nom, PDO::PARAM_STR); 
					  $stmt->bindParam(":email", $param_email, PDO::PARAM_STR); 
					  $stmt->bindParam(":cle", $param_cle, PDO::PARAM_STR); 
					  $stmt->bindParam(":creer_a", $param_creer_a, PDO::PARAM_STR); 
					  $stmt->bindParam(":actif", $param_actif, PDO::PARAM_STR); 
		   
					  // Définir les paramètres 
					  $param_prenom = $prenom; 
					  $param_nom = $nom; 
					  $param_email = $email; 
					  $param_cle = $cle; 
					  $param_password = $mot_de_passe; 
					  $param_creer_a = $creer_a; 
					  $param_actif = 0; 
		   
					  // Tentative d'exécution de la déclaration préparée 
					  if($stmt->execute()){ 
		   
						require_once 'PHPMailer/src/Exception.php'; 
						require_once 'PHPMailer/src/PHPMailer.php'; 
						require_once 'PHPMailer/src/SMTP.php'; 
		   
						$mail = new PHPMailer(true); 
		   
						try { 
							  //Server settings 
							  $mail->CharSet = 'UTF-8'; 
							  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
							  $mail->isSMTP();                          //Send using SMTP
							  $mail->Host       = 'smtp.gmail.com';     //Set the SMTP server to send through
							  $mail->SMTPAuth   = true;                 //Enable SMTP authentication
							  $mail->Username   = 'lyonscootesgi@gmail.com';  //SMTP username
							  $mail->Password   = 'LyonScoot123';       //SMTP password
							  $mail->SMTPSecure = 'tls';                //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
							  $mail->Port       = 587;                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		   
							  //Recipients 
							  $mail->setFrom('lyonscootesgi@gmail.com', 'LyonScoot'); 
							  $mail->addAddress($email);     //Add a recipient 
		   
							  //Content 
							  $mail->isHTML(true);         //Set email format to HTML
							  $mail->Subject = "Vérification de mail"; 
							  $mail->Body    = "Merci de vous êtes inscrit sur le LyonScoot, 
		   
							  Pour activer votre compte, veuillez cliquer sur le lien ci-dessous. 
							http://localhost/Projet-Annuel/validation.php?log=".urlencode($nom)."&cle=".urlencode($cle)." 
		   
							  Ceci est un mail automatique. 
							  Merci de ne pas y répondre"; 
							  // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 
		   
							  $mail->send(); 
							  $mail_ok = 'Le mail a été envoyé'; 
						  } catch (Exception $e) { 
							  $mail_error = "Votre compte est bien crée"; 
						  } 
		   
					  // Fermer la déclaration 
					  unset($stmt); 
				  } 
		   
			  // Fermer la connexion 
			  unset($conn); 
			} 
		  } 
		} 
?>