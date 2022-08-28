<?php include('connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Connexion</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<?php include 'includes/header.php' ?>
	<div class="container">

        <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2 class="text-center"><?php echo $lang['connexion'];?></h2>
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email" required="required" autocomplete="off">
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block" style="background-color:#22a311; border-color:#22a311"><?php echo $lang['connexion'];?></button>
                </div>
            </form>
            <p class="text-center"><a href="inscription.php"><?php echo $lang['sinscrire'];?></a></p>
            </div>
        </div>
	<?php include 'includes/footer.php' ?>
	</body>
</html>