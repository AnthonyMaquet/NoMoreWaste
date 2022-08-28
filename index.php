<?php
include 'bdd.php';
require_once "profil_param.php";
include ('traduction/localization.php');
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>NO MORE WASTE</title>
		<meta charset="utf-8">
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

<main style="background-image:url(image/foret.jpg); color: white; background-size: cover;">
			<div class="container text-center py-5 background" >
                <h1><strong><?php echo $lang['titredon'];?></strong></h1>
                <div class="row justify-content-center align-items-center">
                        <div class="meteo_desc text-left">
                        <h2><strong><?php echo $lang['descdon'];?></strong></h2>
							<div style="padding:5px">
								<a href="donalimentaire.php" type="button" class="w-100 btn btn-lg btn-danger" style="background-color:brown; border-color:brown"><?php echo $lang['donalimentaire'];?></a>
							</div>
							<div style="padding:5px">
								<a href="don5euros.php" type="button" class="w-100 btn btn-lg btn-danger" style="background-color:#22a311; border-color:#22a311"><?php echo $lang['faireundon'];?> 5€</a>
							</div>
							<div style="padding:5px">
								<a href="don10euros.php" type="button" class="w-100 btn btn-lg btn-danger" style="background-color:#22a311; border-color:#22a311"><?php echo $lang['faireundon'];?> 10€</a>
							</div>
							<div style="padding:5px">
								<a href="don20euros.php" type="button" class="w-100 btn btn-lg btn-danger" style="background-color:#22a311; border-color:#22a311"><?php echo $lang['faireundon'];?> 20€</a>
							</div>
							<div style="padding:5px">
								<a href="don50euros.php" type="button" class="w-100 btn btn-lg btn-danger" style="background-color:#22a311; border-color:#22a311"><?php echo $lang['faireundon'];?> 50€</a>
							</div>
							<div style="padding:5px">
								<a href="don100euros.php" type="button" class="w-100 btn btn-lg btn-danger" style="background-color:#22a311; border-color:#22a311"><?php echo $lang['faireundon'];?> 100€</a>
							</div>
                </div>
            </div>
		</div>
</form>
		</main>
	<?php include 'includes/footer.php' ?>
	<script src="carte/app.js"></script>
	</body>
</html>
