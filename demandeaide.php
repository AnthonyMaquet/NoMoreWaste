<?php
require_once "profil_param.php";
require_once "bdd.php";
include ('traduction/localization.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Demande d'aide</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="game/styles.css" />
	</head>

<?php include('includes/header.php'); ?>

 <body class="d-flex flex-column min-vh-100">
    <div class="position-relative overflow-hidden p-3 m-md-3 text-center bg-light" style="background-image:url(image/association.jpg); margin:0 !important">
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h1 class="display-4 fw-normal" style="color:white">Demande d'aide</h1>
      <p class="lead fw-normal" style="color:white">Pour que nous puissions vous aider au mieux, veuillez renseigner certaines informations dans le formulaire qui suit :</p>
    </div>
  </div>


  <h2 style="text-align:center; padding-top:10px">Entrez les informations des produits dans le formulaire :</h2><br>
    <?php
    //Connexion à la BDD
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");
    if(isset($_POST['nom']) AND isset($_POST['adresse'])  AND isset($_POST['nombre_personne']) AND isset($_POST['description']) AND isset($_POST['preference']) AND !empty($_POST['nom']) AND !empty($_POST['adresse']) AND !empty($_POST['nombre_personne']) AND !empty($_POST['description']) AND !empty($_POST['preference']))
{
    $nom = $_POST['nom'];
	$adresse = $_POST['adresse'];
    $nombre_personne = $_POST['nombre_personne'];
    $description = $_POST['description'];
    $preference = $_POST['preference'];
	$insert = $bdd->prepare('INSERT INTO demandedaide(nom, adresse, nombre_personne, description, preference) VALUES(?, ?, ?, ?, ?)');
	$insert->execute(array($nom, $adresse, $nombre_personne, $description, $preference)); 
    ?><div style="text-align:center"><strong><em><?php echo "Les informations ont bien était traité" ?></em></strong></div><?php ; ?>
<?php }else ?><div style="text-align:center"><strong><em><?php echo "Il manque un ou plusieurs champs à compléter"?></em></strong></div><?php;
    ?>
    <form method="post" action="" style="text-align:center">
        <div>
            <label for="nom"><em>Votre nom ou nom de l'association:</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="nom" id="nom">
        </div>
		<div>
            <label for="adresse"><em>Votre adresse :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="adresse" id="adresse">
        </div>
        <div>
            <label for="nombre_personne"><em>Combien de personnes êtes vous dans la famille ou l'association :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="nombre_personne" id="nombre_personne"></input>
        </div>
        <div>
            <label for="description"><em>Petite description de votre situation :</em></label><br>
            <textarea style="border: 1px solid #22a311" type="text" name="description" id="description"></textarea>
        </div>
        <div>
            <label for="preference"><em>Quels sont vos aliments préférés (nous allons essayer de voir ce que nous pouvons faire) :</em></label><br>
            <textarea style="border: 1px solid #22a311" type="text" name="preference" id="preference"></textarea>
        </div><br>
        <button type="submit" class="btn btn-info" style="background-color: #22a311">Valider</button> 
    </form>

  
</body>
<?php include('includes/footer.php'); ?>
</html>