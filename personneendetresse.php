<?php
require_once "profil_param.php";
require_once "bdd.php";
include ('traduction/localization.php');

$q = 'SELECT * FROM demandedaide' ;
$req = $conn->prepare($q);
$req->execute();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Personne en détresse</title>
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
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image:url(image/association.jpg); margin:0 !important">
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h1 class="" style="color:white">Infos sur les Personnes et les Associations </h1>
      <p class="lead fw-normal" style="color:white">Voici la liste des personnes en détresse et des associations qui ont besoin d'aide, pensez à les supprimer de liste une fois leur cas traité</p>
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
    <h5 class="card-title"><strong><em><?php echo $details['nom']; ?></em></strong></h5>
	<p><em>Adresse : </em><br><?php echo $details['adresse'];?></p> 
	<p><em>Nombre de personnes :</em><br> <?php echo $details['nombre_personne'];?></p> 
    <p><em>Description rapide :</em><br><?php echo $details["description"]; ?></p>
    <p><em>Préférence alimentaire :</em><br> <?php echo $details['preference'];?></p> 
    <?php $article = $details["demande_id"]; ?>
    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group py-md-1 pl-md-3 padding-left-0">
    <!-- <a type="button" class="w-100 btn btn-lg" style="background-color:#22a311; border-color:#22a311; color:white">Supprimer de la liste</a><br> -->
    <a href="BackOffice/suppersonnendetresse.php?demande_id=<?=$details['demande_id']; ?>" class="btn" style="background-color:#22a311; border-color:#22a311; color:white" onClick='return confirm("Vous êtes sur ?")'>Supprimer de la liste</a>
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