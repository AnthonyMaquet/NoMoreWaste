<?php
require_once "profil_param.php";
require_once "bdd.php";
include ('traduction/localization.php');

$q = 'SELECT * FROM collecte' ;
$req = $conn->prepare($q);
$req->execute();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Liste des points de collecte</title>
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
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image:url(image/collecte.jpg); margin:0 !important; background-size: 100% 120%">
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h1 class="" style="color:white">Liste des points de Récupération</h1>
      <p class="lead fw-normal" style="color:white">Voici la liste des dons alimentaires, appelez les personnes avant d'aller récupérer les produits pour faire votre tournée de collecte. Supprimez de la liste une fois ajouté a votre tournée de collecte</p>
    </div>
  </div>

    <main class="col-12 py-md-3 pl-md-5" role="main">
    <div class = "container">
      <div class="row">
      <div class="d-flex justify-content-around flex-wrap">
    <?php
    while($details = $req->fetch()){
        ?>

    <div class="card mb-4" style="width: 18rem;">
  
  <div class="card-body" style="text-align:center; border: 1px solid #22a311">
    <h5 class="card-title"><strong><em><?php echo $details['adresse']; ?></em></strong></h5>
	<p><em>Type (Asso ou Particulier) : </em><br><?php echo $details['type'];?></p> 
	<p><em>Nom :</em><br> <?php echo $details['nom'];?></p> 
  <p><em>Numéro de Téléphone :</em><br> <?php echo $details['numero_tel'];?></p> 
  <p><em>Adresse :</em><br> <?php echo $details['adresse'];?></p> 
    <p><em>Prévision de la quantité :</em><br><?php echo $details["prevision_stock"]; ?></p>
    <p><em>Prévision des produits :</em><br> <?php echo $details["prevision_produit"];?></p> 
    <?php $article = $details["collecte_id"]; ?>
    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group py-md-1 pl-md-3 padding-left-0">
    <!-- <a type="button" class="w-100 btn btn-lg" style="background-color:#22a311; border-color:#22a311; color:white">Supprimer de la liste</a><br> -->
    <a href="BackOffice/suppcollecte.php?collecte_id=<?=$details['collecte_id']; ?>" class="btn" style="background-color:#22a311; border-color:#22a311; color:white" onClick='return confirm("Vous êtes sur ?")'>Supprimer de la liste</a>
</div>
  </div>
</div>
<?php  }
 ?>
</div>
</div>
</div>
</main>

</body>
<?php include('includes/footer.php'); ?>
</html>