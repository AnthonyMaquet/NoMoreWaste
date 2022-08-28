<?php
require_once "bdd.php";
require_once "profil_param.php";
include ('traduction/localization.php');

require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
		<title>Panier</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="styleboutique.css">

	</head>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-sm bg-white fixed-top">
    <div class ="collapse navbar-collapse justify-content-between">

        <ul class="navbar-nav">
            <div class ="collapse navbar-collapse justify-content-between">
                <a href="index.php"><img src="image/vrailogo.png" style="width:60px" ></a>
                <h1><a href="index.php"><span class="badge badge-danger" style="background-color:#22a311 !important"><?php echo $lang['bienvenue'];?></span></a></h1>
            </div>
        </ul>
  <div>
        <a href="index.php?lang=fr"><img src="https://i.pinimg.com/736x/69/a3/40/69a340dd8937b1942659090a48531c76.jpg" width="20rem" height="20rem"></a>
        <a href="index.php?lang=en"><img src="https://www.le-monde-du-stickers.fr/7737/sticker-drapeau-anglais.jpg" width="20rem" height="20rem"></a>
</div>
        <div class="form-inline">
            <?php if(isset($_SESSION['id'])): ?>
                <b style="padding-right:20px;"><?php echo $lang['bonjour'];?> <?php echo $_SESSION['prenom']; ?>, vous êtes<br> <p> un <?php
												if ($resultat['role']==0) {
													echo " Visiteur";
												}elseif ($resultat['role']==1) {
													echo " Administrateur";
												}elseif ($resultat['role']==2) {
													echo " Membre";
												}elseif ($resultat['role']==3) {
													echo " Bénévole";} ?></p></b>
            <?php endif; ?>
            <div class="dropdown" style="margin-right: 7px;">
                <button type="button" class="btn btn-danger dropdown-toggle" style="background-color:#22a311; border-color:#22a311" data-toggle="dropdown" style="">+</button>
                <div class="dropdown-menu">
                  <?php
                  if(!isset($_SESSION["role"])){
                    echo '<li class="nav-item"><a class="dropdown-item" href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                  }elseif(isset($_SESSION['id']) && ($_SESSION['role'] == '1')){
					echo '<li class="nav-item"><a class="dropdown-item" href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="profil.php">Mon profil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="personneendetresse.php">Personne en detresse</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="produit.php">Produits</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="echangeservice.php">Echange de service</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="BackOffice/membres.php">Back Office</a></li>';
                }elseif(isset($_SESSION['id']) && ($_SESSION['role'] == '2')){
                    echo '<li class="nav-item"><a class="dropdown-item" href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="profil.php">Mon profil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="demandeaide.php">Demande d\'aide</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="echangeservice.php">Echange de service</a></li>';
                }elseif(isset($_SESSION['id']) && ($_SESSION['role'] == '3')){
                    echo '<li class="nav-item"><a class="dropdown-item" href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="profil.php">Mon profil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="personneendetresse.php">Personne en detresse</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="produit.php">Produits</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="echangeservice.php">Echange de service</a></li>';
                }elseif(isset($_SESSION['id']) && ($_SESSION['role'] == '0')){
                    echo '<li class="nav-item"><a class="dropdown-item" href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="profil.php">Mon profil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="rejoindre.php">Nous rejoindre</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="echangeservice.php">Echange de service</a></li>';
                }?>

                </div>
            </div>
            <?php if(!isset($_SESSION['id'])): ?>
                <div class="input-group">
                    <a class="btn btn-danger" style="background-color:#22a311; border-color:#22a311" href="inscription.php"><?php echo $lang['inscription'];?></a>
                </div>
            <?php endif; ?>

            <div class="input-group p-2">
                <?php if(isset($_SESSION['id'])): ?>
                    <a href="deconnexion.php" class="btn btn-danger" style="background-color:#22a311; border-color:#22a311"><?php echo $lang['deconnexion'];?> </a>
                <?php else: ?>
                    <a class="btn btn-danger" style="background-color:#22a311; border-color:#22a311" href="login.php"><?php echo $lang['connexion'];?></a>
                <?php endif; ?>
            </div>
        </div>

    </div>
    </nav><br /><br /><br /><br />
<div>
        <p><?php echo $lang['descriptionheader'];?></p>
    </div>
</header>
<hr>

<!-- Description page -->
<body class="d-flex flex-column min-vh-100">
    <!-- <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image:url(image/Produit/produit.png); margin:0 !important"> -->
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h4 class=" fw-normal" style="color:white">Voici les produits qui vont partir lors de la prochaine livraison </h4>
      <a href="produit.php" style="color:white; display: flex; justify-content: center; align-items:center">Back</a>
    <!-- </div> -->
  </div>
<form method="post" action="panier.php">
<h6 style="text-align: center">Nombre de produit au total : <?php echo $panier->count(); ?></h6>

<!-- Afichage du panier -->
<?php 
$produit_ids = array_keys($_SESSION['panier']);
if(empty($produit_ids)){ //si c'est vide
    $produit = array();
}else{
    $produit = $DB->query('SELECT * FROM produit WHERE produit_id IN ('.implode(',',$produit_ids).')');
}
foreach($produit as $produit):
?>

<?php
    //Connexion à la BDD
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");
    if(isset($_POST['nom_produit']) AND isset($_POST['description']) AND isset($_POST['quantite']) AND !empty($_POST['nom_produit']) AND !empty($_POST['description']) AND !empty($_POST['quantite']))
{
    $nom_produit = $_POST['nom_produit'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
	$insert = $bdd->prepare('INSERT INTO commande(nom_produit, description, quantite ) VALUES(?, ?, ?)');
	$insert->execute(array($nom_produit, $description, $quantite)); 
    ?><div style="text-align:center"><strong><em><?php echo "La commande est bien en cours de traitement" ?></em></strong></div><?php ; ?>
<?php }?>
<div style="display: grid;">
<div>
  <div style="text-align:center; border: 1px solid #22a311">
    <h5><input type="text" name="nom_produit" value="<?= ($produit->nom_produit);?>"></h5>
    <img style="width:50px" src="<?= ($produit->image);?>" alt="Image produit"></img>
    <p><em>Description du produit : </em><br><input name="description" type="text" value="<?= ($produit->description);?>"></input></p>
    <p><em>Quantité :<input type="number" name="quantite" value="<?= $_SESSION['panier'][$produit->produit_id];?>"></em></p> 
    <div class="form-group py-md-1 pl-md-3 padding-left-0">
    <a type="button" href="panier.php?delPanier=<?= $produit->produit_id; ?>" class="w-100 btn btn-lg" style="background-color:green; border-color:#22a311; color:white">Supprimer de la livraison</a>
</div>
  </div>
</div>

<?php endforeach; ?>
<div style="display: flex; justify-content: center; align-items:center">
<button type="submit" class="btn btn-danger">Valider la commande</button> 
</div>
<br>
<!-- <input type="submit" value="Valider"> -->
</form>

</body>
<?php include('includes/footer.php'); ?>
</html>
