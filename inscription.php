<?php 
require_once "bdd.php"; 
require_once 'inscription_traitement.php'; 
include ('traduction/localization.php'); 
?> 
 
<!DOCTYPE html> 
<html lang="fr"> 
<head> 
		<title>Inscription</title> 
		<meta charset="utf-8"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> 
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
	  	<link rel="stylesheet" type="text/css" href="css/style.css"> 
</head> 
<body>
<?php include 'includes/header.php' ?>
<div class="container login">
		<div class="row">
            <div class="col-sm-12">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return checkFields()"element>
        <h2 class="text-center"><?php echo $lang['inscription'];?></h2>
        <span class="help-block"><?php echo $mail_ok; ?></span>
        <span class="help-block"><?php echo $mail_error; ?></span>
        <div class="form-group <?php echo (!empty($nom_err)) ? 'has-error' : ''; ?>">
            <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>" placeholder="Nom" required="required" autocomplete="off">
            <span class="help-block"><?php echo $nom_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($prenom_err)) ? 'has-error' : ''; ?>">
            <input type="text" name="prenom" class="form-control" value="<?php echo $prenom; ?>" placeholder="Prénom" required="required" autocomplete="off">
            <span class="help-block"><?php echo $prenom_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email" required="required" autocomplete="off">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Mot de passe" required="required" autocomplete="off">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Saisissez le mot de passe de nouveau" required="required" autocomplete="off">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
	    <div class="form-group <?php echo (!empty($captcha_err)) ? 'has-error' : ''; ?>">
            <input type="text" name="captcha" class="form-control" placeholder="Saisir le captcha" required="required" autocomplete="off" value="<?php echo $captcha; ?>">
			<p>Captcha : <img src="captcha.php" style="vertical-align: middle;"/></p>
            <span class="help-block"><?php echo $captcha_err; ?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block" style="background-color:#22a311; border-color:#22a311"><?php echo $lang['inscription'];?></button>
        </div>
        <p class="text-center"><a href="login.php">Se connecter ?</a></p>
    </form>
        </div>
</div>
</div>
</div>

<?php include 'includes/footer.php' ?>
	
</body>
</html>