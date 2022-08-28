<?php
require_once "profil_param.php";
include ('traduction/localization.php');

$bdd = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");

if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) AND !empty($_POST['message']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$message = htmlspecialchars($_POST['message']);
	$insertmsg = $bdd->prepare('INSERT INTO echangedeservice(pseudo, message) VALUES(?, ?)');
	$insertmsg->execute(array($pseudo, $message)); 
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
		<title>Echange de service</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
<?php include('includes/header.php'); ?>
<!-- Intro -->
    <div class="position-relative overflow-hidden p-3 m-md-3 text-center bg-light" style="background-image:url(image/echangeservice.jpg); background-size:50%; margin:0 !important">
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h1 class="display-4 fw-normal" style="color:white"><?php echo $lang['echangedeservice'];?></h1>
      <p class="lead fw-normal" style="color:white"><?php echo $lang['descechangedeservice'];?></p>
    </div>
  </div>
<!-- Chat -->
<div style="text-align:center; background-color:#d5cdcd4f" >
		<form method="post" action="" style="padding-top:10px; padding-bottom:5px">
			<input style="margin-bottom:10px; border: 1px solid #22a311" type="text" name="pseudo" placeholder="Votre Pseudo" value="<?php if(isset($pseudo)) { echo$pseudo; }?>"/><br>
			<textarea style="margin-bottom:5px; border: 1px solid #22a311" type="text" name="message" placeholder="Votre Message"></textarea><br>
			<input class="btn btn-lg btn-danger" style="background-color:#22a311; border-color:#22a311" type="submit" value="Envoyer"/>
		</form>

		<?php
		$allmsg = $bdd->query('SELECT * FROM echangedeservice ORDER BY id DESC');
		while($msg = $allmsg->fetch())
		{
			?>
		<b><?php echo $msg['pseudo'];?> : </b><?php echo $msg['message'];?><br>
		<?php
		}
		?>
</div>
</body>
<?php include('includes/footer.php'); ?>
