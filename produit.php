<?php
require_once "bdd.php";
require_once "profil_param.php";
include ('traduction/localization.php');

//Gestion des stocks
// $quantiteBase = 10;
// $qantitePanier = 2;
// $newStock = $quantiteBase - $qantitePanier;
// $updateQuantite = $conn->prepare('UPDATE produit SET quantite = ?' );
// $updateQuantite->execute(array($newStock,)); 

// Gestion des stocks
// $quantiteBase = $details['quantite'];
// $quantitePanier = $_SESSION['panier'][$produit->produit_id];
// $produit = $details['produit_id'];
// $newStock = $quantiteBase - $qantitePanier;
// $updateQuantite = $conn->prepare('UPDATE produit SET quantite = ? WHERE produit_id = ?' );
// $updateQuantite->execute(array($newStock, $produit_id)); 

//Gestion affichage des produits
$q = 'SELECT * FROM produit WHERE quantite >0' ;
$req = $conn->prepare($q);
$req->execute();

//Traitement barre de recherche :
@$keywords=$_GET["keywords"];
@$valider=$_GET["valider"];
if(isset($valider) && !empty(trim($keywords))){
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");
    $res=$bdd->prepare("SELECT * FROM produit WHERE nom_produit like '%$keywords%'");
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute();
    $tab=$res->fetchAll();
    $afficher="oui";
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
		<title>Produits</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="styleboutique.css">

	</head>

<?php include('includes/header.php'); ?>

<body class="d-flex flex-column min-vh-100">
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image:url(image/Produit/produit.png); margin:0 !important">
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h1 class="display-4 fw-normal" style="color:white">Produit dont dispose l'association </h1>
      <p class="lead fw-normal" style="color:white">Voici les produits dont nous disposons, après avoir consulté la page "Personne en détresse" sélectionnez les produits qui seront distribué lors de la prochaine livraison</p>
      <p style="color:white">Pour voir le récapitulatif de la livraison : <a href="panier.php" class=" btn btn-lg" style="background-color:#22a311; border-color:#22a311; color:white">Liste d'envoie</a></p>
    </div>
  </div><br>

<!-- Barre de Recherche -->
<div style="display: flex; justify-content: center; align-items:center">
    <h5>Recherche des produits :</h5> 
</div>
<div style="display: flex; justify-content: center; align-items:center">
    <form name="fo" method="get" action=""> <!-- Méthode Get pour visualiser les mot clés saisies dans l'URL-->
        <input style="border: 2px solid #22a311" type="text" name="keywords" value="<?php echo $keywords ?>" placeholder="Nom du produit"/> <!-- zone de texte pour saisir les mots clé -->
        <input type="submit" name="valider" value="Rechercher" class="btn" style="background-color:#22a311; border-color:#22a311; color:white"/> <!-- soumettre le formulaire au serveur -->
    </form>
</div><br>
<?php if(@$afficher=="oui") { ?>

<!-- Zone de résultat -->
<div id="resultats" style="display: flex; justify-content: center; align-items:center">
    <div id="nbr"><?=count($tab)."".(count($tab)>1?" résultats trouvés :":" résultat trouvé")?></div> <!-- Nombre de résultat -->
</div>
<div style="display: flex; justify-content: center; align-items:center">
    <ol>
        <?php for($i=0;$i<count($tab);$i++){ ?>
        <ul><strong>Nom :</strong> <em><?php echo $tab[$i]["nom_produit"]?></em> <strong>Code-barre :</strong> <em><?php echo $tab[$i]["code_barre"]?></em> <strong>Quantité :</strong> <em><?php echo $tab[$i]["quantite"]?></em></ul>
        <?php } ?>
    </ol>
</div>
<?php } ?>

<!-- Affichage des produits -->
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
    <img class="card-img-top padding-bottom-20" style="width:100px" src="<?php echo $details['image'];?>" alt="Image produit"></img>
    <p class="lead"><em>Description du produit : </em><br><?php echo $details["description"]; ?></p>
    <p><em>Stock : </em><?php echo $details['quantite'];?></p> 
    <?php $article = $details["produit_id"]; ?>
    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group py-md-1 pl-md-3 padding-left-0">
    <a type="button" href="addpanier.php?produit_id=<?= $details['produit_id']?>" class="w-100 btn btn-lg add addPanier" style="background-color:#22a311; border-color:#22a311; color:white">Ajouter à la prochaine livraison</a>
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
