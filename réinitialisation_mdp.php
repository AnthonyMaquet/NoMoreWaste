<?php
require_once "profil_param.php";
include ('traduction/localization.php');

// Vérifiez si l'utilisateur est connecté, sinon redirigez-vous vers la page de connexion
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Inclure le fichier de configuration
require_once "bdd.php";

// Définit les variables et initialise avec des valeurs vides
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Traitement des données du formulaire lors de la soumission du formulaire
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validez le nouveau mot de passe
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Veuillez saisir le nouveau mot de passe.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Valider confirmer le mot de passe
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Veuillez confirmer le mot de passe.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Les mots de passes ne sont pas identiques.";
        }
    }

    // Vérifiez les erreurs d'entrée avant de mettre à jour la base de données
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE utilisateurs SET mot_de_passe = :mot_de_passe WHERE id = :id";

        if($stmt = $conn->prepare($sql)){
            // Lier des variables à l'instruction préparée en tant que paramètres
            $stmt->bindParam(":mot_de_passe", $param_mot_de_passe, PDO::PARAM_STR);
            $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);

            // Définir les paramètres
            $param_mot_de_passe = hash('sha256', $new_password);
            $param_id = $_SESSION["id"];

            // Tentative d'exécuter l'instruction préparée
            if($stmt->execute()){
                // Mot de passe mis à jour avec succès. Détruire la session et rediriger vers la page de connexion
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Un problème est survenu. Veuillez réessayer plus tard.";
            }

            // Fermer la déclaration
            unset($stmt);
        }
    }

    // Fermer la connexion
    unset($db);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
		<title>Réinitalisation mdp</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
  <body class="d-flex flex-column min-vh-100">
    <?php include('includes/header.php');?>
    <main class="col-12 py-md-3 pl-md-5" role="main">
      <div class=container>
        <div class="row">
          <div class="py-md-3 pl-md-5">
            <h1 class="py-md-3 pl-md-5">Réinitialiser votre mot de passe</h1>
            <div class="container py-md-3 pl-md-5 border border-primary bg-light" style="border-color:#22a311 !important;padding-right:300px">
              <div class="row">
                <p>Remplissez ce formulaire pour réinitialiser votre mot de passe :</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"><br>
                  <div class="form-group py-md-1 pl-md-3 <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>Nouveau mot de passe</label>
                    <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                  </div>
                  <div class="form-group py-md-1 pl-md-3 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirmez le mot de passe</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                  </div>
                  <div class="form-group py-md-1 pl-md-3">
                    <input type="submit" class="btn btn-primary" style="background-color:#22a311; border-color:#22a311" value="Valider">
                    <a class="btn btn-link" style="color:#22a311" href="profile.php">Annuler</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php include('includes/footer.php'); ?>
  </body>
</html>
