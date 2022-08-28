<?php
session_start();
require_once "../bdd.php";
include ('../traduction/localization.php');

$conn = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");
$produit = $_GET['produit'];
$recupProduit = $conn->prepare('SELECT * FROM  produit WHERE produit_id= ?');
$recupProduit->execute(array($produit));
    if ($recupProduit->rowCount()> 0){
        $details = $recupProduit->fetch();
        $nom_produit = $details['nom_produit'];
        $image = $details['image'];
        $description = $details['description'];
        $code_barre = $details['code_barre'];
        $quantite = $details['quantite'];

        if(isset ($_POST ['Confirmer'])){

            $nom_produit_entrer = htmlspecialchars($_POST['nom_produit']);
            $image_entrer = htmlspecialchars($_POST['image']);
            $description_entrer = htmlspecialchars($_POST['description']);
            $code_barre_entrer = htmlspecialchars($_POST['code_barre']);
            $quantite_entrer = htmlspecialchars($_POST['quantite']);

            $updateMessage = $conn->prepare('UPDATE produit SET nom_produit = ?, image = ?, description = ?, code_barre = ?, quantite = ? WHERE produit_id= ?' );
            $updateMessage->execute(array($nom_produit_entrer, $image_entrer, $description_entrer, $code_barre_entrer, $quantite_entrer, $produit));
            
            header('Location: produit_list.php');
        
        }}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Modification Produit</title>
	</head>
	<body>
  <?php include('includes/header.php'); ?>
  <main class="col-12 py-md-3 pl-md-5" role="main">
  <div class=container>
    <div class="row">
    <div class="col-12 py-md-3 pl-md-5">
            <h1 class="py-md-3 pl-md-5">Modification de produit</h1>
            <div class="container py-md-3 pl-md-5 border border-primary bg-light" style="border: 2px solid #22a311 !important">
              <div class="row">
        <p>Veuillez remplir le formulaire pour modifier les produits :</p>
        <form method="POST" action =""><br>
          <div class="form-group py-md-1 pl-md-3">
              <label>Nom du Produit :</label>
              <input type="text" name="nom_produit" class="form-control" style="border: 1px solid #22a311" value="<?= $nom_produit;?>">
          </div>
          <div class="form-group py-md-1 pl-md-3">
              <label>Lien de l'image :</label>
              <input type="text" name="image" class="form-control" style="border: 1px solid #22a311" value="<?= $image;?>">
          </div>
          <div class="form-group py-md-1 pl-md-3">
              <label>Code-barre :</label>
              <input type="text" name="code_barre" class="form-control" style="border: 1px solid #22a311" value="<?= $code_barre;?>">
          </div>
          <div class="form-group py-md-1 pl-md-3">
              <label>Quantite :</label>
              <input type="text" name="quantite" class="form-control" style="border: 1px solid #22a311" value="<?= $quantite;?>">
          </div>
          <div class= "py-md-1 pl-md-3">
            <label>Description :</label>
          </div>
          <div class="input-group py-md-1 pl-md-3">
            </div>
              <textarea type="text" class="form-control" name="description" style="border: 1px solid #22a311"  required><?= $description;?></textarea>
            <div class="form-group py-md-1 pl-md-3">
                <input type="submit" name="Confirmer" class="btn" style="background-color:#22a311; border-color:#22a311; color:white" value="Modifier">
                <input type="reset" class="btn btn-default" value="Rénitialiser">
            </div>
        </form>
      </div>
    </div>
</div>
</div>
</div>
</div>
</main>
</body>
</html>
    