<?php
include 'bdd.php';
require_once "profil_param.php";
include ('traduction/localization.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="utf-8">
    <title>Paiement accepté</title>
		<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="meteo.css">

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="carte/app.css">
    </head>
    <body>
<?php include 'includes/header.php' ?>
    <section style="text-align: center; padding: 1em; border: 0.3em solid #22a311; background: #D0D3D4;">
<h1>NO MORE WASTE vous remercie pour votre don</h1>
<h2>Don accepté</h2>
<h2>N'hésitez pas à devenir bénévole</h2>
<h3>A la prochaine !</h3>
<h4>NO MORE WASTE<img style="width: 50px; image-align" src="image/vrailogo.png"></h4>
    </section>
<?php include 'includes/footer.php' ?>
<script src="carte/app.js"></script>
</body>
</html>