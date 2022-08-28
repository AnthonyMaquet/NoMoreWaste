<?php
require_once "profil_param.php";
require_once "bdd.php";
include ('traduction/localization.php');
?>

<!DOCTYPE html>

<html lang="fr" dir="ltr">
<head>
		<title>Conseils anti-gaspillage</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
<?php include('includes/header.php'); ?>

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image:url(image/antigaspi.jpg); margin:0 !important">
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h1 class="display-4 fw-normal" style="color:white"><?= $lang['conseilantigaspi'];?></h1>
      <p class="lead fw-normal" style="color:white"><?= $lang['descconseilantigaspi'];?></p>
    </div>
  </div>

 <!-- Conseil 1 -->
 <div style="padding-left:20px; text-align:center; background-image:url(image/chapelure.jpg); background-size:25%">
<br><br>
<div class="container py-md-3 pl-md-5 bg-light">
<h2><em><?= $lang['conseil1'];?></em></h2>
  <p><em><?= $lang['descconseil1'];?></em></p>
  <p><em><?= $lang['descconseil1.2'];?></em></p> 
</div>
<br><br>
</div>

<!-- Conseil 2 -->
<div style="padding-left:20px; text-align:center; background-image:url(image/pelure.jpg); background-size:25%">
<br><br>
<div class="container py-md-3 pl-md-5 bg-light">
<h2><em><?= $lang['conseil2'];?></em></h2>
  <p><em><?= $lang['descconseil2'];?></em></p>
  <p><em><?= $lang['descconseil2.2'];?></em></p> 
</div>
<br><br>
</div>

<!-- Conseil 3 -->
<div style="padding-left:20px; text-align:center; background-image:url(image/reste.jpg); background-size:25%">
<br><br>
<div class="container py-md-3 pl-md-5 bg-light">
<h2><em><?= $lang['conseil3'];?></em></h2>
  <p><em><?= $lang['descconseil3'];?></em></p>
  <p><em><?= $lang['descconseil3.2'];?></em></p> 
</div>
<br><br>
</div>

<?php 
  include('includes/footer.php'); ?>
</body>
</html>
