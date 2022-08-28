<?php
session_start();
require_once "bdd.php";
include ('traduction/localization.php');

// Vérifiez si l'utilisateur est déjà connecté, si oui, redirigez-le vers la page d'accueil
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Définir des variables et initialiser avec des valeurs vides
$email = $password = "";
$email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	// Vérifiez si l'email est vide
    if(empty(trim($_POST["email"]))){
        $email_err = "Veuillez entrer votre email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Valider le mot de passe
    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez entrer votre mot de passe.";
    } else{
        $password = htmlspecialchars(hash('sha256', $_POST['password']));
    }

	// Valider les identifiants
    if(empty($email_err) && empty($password_err)){
        // Préparez une déclaration de sélection
        $sql = "SELECT id, nom, mot_de_passe, prenom, email, statut, pseudo, role FROM utilisateurs WHERE email = :email";

        if($stmt = $conn->prepare($sql)){
            // Lier des variables à l'instruction préparée en tant que paramètres
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            // Définir les paramètres
            $param_email = trim($_POST["email"]);

			// Tentative d'exécuter l'instruction préparée
            if($stmt->execute()){
                // Vérifiez si le nom d'utilisateur existe, si oui, vérifiez le mot de passe
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $role = $row['role']; //contient 0 ou 1
                        $user_id = $row["id"];
                        $email = $row["email"];
						$prenom = $row["prenom"];
						$pseuso = $row["pseudo"];
                        $hashed_password = $row["mot_de_passe"];
                        if($password == $hashed_password){ //Vérifiez si le mot de passe est correct
                          //if($actif == '1') { //Si le compte est actif alors la session peut s'ouvrir

                            session_start();

                            // Stocker les données dans des variables de session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $user_id;
                            $_SESSION["email"] = $email;
                            $_SESSION["role"] = $role;
							$_SESSION["pseudo"] = $pseudo;
							$_SESSION["prenom"] = $prenom;

							// Redirige l'utilisateur vers la page d'accueil
                            if($_SESSION['role'] == '1' || $_SESSION['role'] == '2' || $_SESSION['role'] == '3' || $_SESSION['role'] == '4'){
                                header('Location:index.php');
                              }else{
                                header('Location:index.php');
                              }
                          //}else{
                            //$actif_err = "Le compte n'est pas activé. Veuillez vérifier vos emails.";
                          //}
                        } else{
                            // Afficher un message d'erreur si le mot de passe n'est pas valide
                            $password_err = "Le mot de passe que vous avez entré n'est pas valide.";
                        }
                    }
                } else{
                    // Afficher un message d'erreur si l'email n'existe pas
                    $email_err = "Aucun compte trouvé avec cet email.";
                }
            } else{
                echo "Oops! Un problème est survenu. Veuillez réessayer plus tard.";
            }

            // Fermer la déclaration
            unset($stmt);
        }
    }

    // Fermer la Connexion
    unset($conn);
}
?>

