<?php
session_start();
require_once "../bdd.php";
include ('../traduction/localization.php');


$conn = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");
$q = 'SELECT * FROM produit' ;
$req = $conn->prepare($q);
$req->execute();
?>

<!DOCTYPE html>

<html lang="fr" dir="ltr">
<head>
		<title>Liste produit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../styleboutique.css">
	</head>

<!-- Header -->
<header>
<?php if(isset($_SESSION['id']) && ($_SESSION['role'] == '1')){?>
  <nav class="navbar navbar-expand-lg" style="background-color:green; !important">
    <a class="navbar-brand align-middle" style="color:white" href="../index.php">NO MORE WASTE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li>
          <a class="nav-link" style="color: white" href="membres.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Produits
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="ajout_produit.php">Ajouter un produit</a>
            <a class="dropdown-item" href="produit_list.php">Modifier un produit</a>
        </li>

<?php }?>
        <div style="padding-left:450px">
           <a href="index.php?lang=fr"><img src="https://i.pinimg.com/736x/69/a3/40/69a340dd8937b1942659090a48531c76.jpg" width="20rem" height="20rem"></a>
           <a href="index.php?lang=en"><img src="https://www.le-monde-du-stickers.fr/7737/sticker-drapeau-anglais.jpg" width="20rem" height="20rem"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left:500px">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">+</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../index.php">Accueil</a>            
            <a class="dropdown-item" href="../webgl.php">WebGL</a> 
            <a class="dropdown-item" href="../profil.php">Mon profil</a> 
            <a class="dropdown-item" href="../collecte.php">Points de collecte de don</a>
            <a class="dropdown-item" href="../personneendetresse.php">Personne en detresse</a> 
            <a class="dropdown-item" href="../produit.php">Produits</a> 
            <a class="dropdown-item" href="../conseilantigaspi.php">Conseils anti-gaspi</a> 
            <a class="dropdown-item" href="../courscuisine.php">Cours de cuisine</a>
            <a class="dropdown-item" href="../echangeservice.php">Echange de service</a>
            <a class="dropdown-item" href="../BackOffice/membres.php">Back Office</a>
        </li>
</div>
        <li class="nav-item" >
          <a class="nav-link" style="color:white;" href="../deconnexion.php">Déconnexion</a>
        </li> 
        
      </ul>
    </div>
  </nav>
</header>

<body class="d-flex flex-column min-vh-100">
<h2 style="text-align:center; padding-top:10px">Si vous souhaitez modifier les informations d'un produit, remplissez ce formulaire :</h2><br>

    <main class="col-12 py-md-3 pl-md-5" role="main">
    <div class = "container">
      <div class="row">
      <div class="d-flex justify-content-around flex-wrap">
    <?php
    while($details = $req->fetch()){
        ?>

    <div class="card mb-4" style="width: 18rem;">
  
  <div class="card-body" style="text-align:center; border: 1px solid #22a311">
  <h5 class="card-title"><?php echo $details['nom_produit']; ?></h5>
  <p><em>Lien de l'image :<br> </em><?php echo $details['image'];?></p> 
    <p class="lead"><em>Description du produit : </em><br><?php echo $details["description"]; ?></p>
    <p><em>Stock : </em><?php echo $details['quantite'];?></p> 
    <?php $produit = $details["produit_id"]; ?>
    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group py-md-1 pl-md-3 padding-left-0">
    <?php
                  $url = $details['produit_id'];
                  echo '<a href="modif_produit.php?produit=' . urlencode($url) . '"class="btn btn-primary" style="background-color:#22a311; border-color:#22a311; color:white">Modifier</a>';
    ?><br><br>
    <a href="supproduit.php?produit_id=<?=$details['produit_id']; ?>" class="btn" style="background-color:#22a311; border-color:#22a311; color:white" onClick='return confirm("Vous êtes sur ?")'>Supprimer le produit</a>

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
</html>
