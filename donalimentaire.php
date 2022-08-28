<?php
require_once "profil_param.php";
require_once "bdd.php";
include ('traduction/localization.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Don alimentaire</title>
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
    <div class="position-relative overflow-hidden p-3 m-md-3 text-center bg-light" style="background-image:url(image/collecte.jpg); margin:0 !important; background-size: 100% 120%">
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h1 class="display-4 fw-normal" style="color:white">Don Alimentaire</h1>
      <p class="lead fw-normal" style="color:white">Que vous soyez particulier, entreprise ou association n'hésitez pas à nous faire des dons alimentaires en remplissant ce formulaire, nous vous recontacterons dans les plus brefs délais pour venir récupérer ces aliments :</p>
    </div>
  </div>


  <h2 style="text-align:center; padding-top:10px">Entrez vos informations dans le formulaire :</h2><br>
    <?php
    //Connexion à la BDD
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");
    if(isset($_POST['type'])AND isset($_POST['nom']) AND isset($_POST['numero_tel']) AND isset($_POST['adresse'])  AND isset($_POST['prevision_stock']) AND isset($_POST['prevision_produit']) AND !empty($_POST['type']) AND !empty($_POST['nom']) AND !empty($_POST['numero_tel']) AND !empty($_POST['adresse']) AND !empty($_POST['prevision_stock']) AND !empty($_POST['prevision_produit']))
{
    $type = $_POST['type'];
    $nom = $_POST['nom'];
    $numero_tel = $_POST['numero_tel'];
	$adresse = $_POST['adresse'];
    $prevision_stock = $_POST['prevision_stock'];
    $prevision_produit = $_POST['prevision_produit'];
	$insert = $bdd->prepare('INSERT INTO collecte(type, nom, numero_tel, adresse, prevision_stock, prevision_produit) VALUES(?, ?, ?, ?, ?, ?)');
	$insert->execute(array($type, $nom, $numero_tel, $adresse, $prevision_stock, $prevision_produit)); 
    ?><div style="text-align:center"><strong><em><?php echo "Les informations ont bien était traité" ?></em></strong></div><?php ; ?>
<?php }else ?><div style="text-align:center"><strong><em><?php echo "Il manque un ou plusieurs champs à compléter"?></em></strong></div><?php;
    ?>
    <form method="post" action="" style="text-align:center">
        
        <div>
        <label for="type"><em>Etes vous une association ou un particulier ?</em></label><br>
                <select style="border: 1px solid #22a311" name="type" id="type">
                    <option value="Association">Association</option>
                    <option value="Particulier">Particulier</option>
                </select>
        </div>
        <!-- <div>
            <label for="type"><em>Etes vous une association ou un particulier ?</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="type" id="type">
        </div> -->
        <div>
            <label for="nom"><em>Votre nom ou nom de l'association :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="numero_tel"><em>Numéro de téléphone ou nous pouvons vous contacter :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="numero_tel" id="numero_tel">
        </div>
		<div>
            <label for="adresse"><em>Adresse ou venir récupeérer les produits :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="adresse" id="adresse">
        </div>
        <div>
            <label for="prevision_stock"><em>Prévision du nombre de produits que vous souhaitez donner :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="prevision_stock" id="prevision_stock"></input>
        </div>
        <div>
            <label for="prevision_produit"><em>Prévision des produits à donner (frais ou autres ...) :</em></label><br>
            <textarea style="border: 1px solid #22a311" type="text" name="prevision_produit" id="prevision_produit"></textarea>
        </div><br>
        <button type="submit" class="btn btn-info" style="background-color: #22a311">Valider</button> 
    </form>

  
</body>
<?php include('includes/footer.php'); ?>
</html>