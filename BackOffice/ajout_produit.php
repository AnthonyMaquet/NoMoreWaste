<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Produit</title>
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

<body>
<h2 style="text-align:center; padding-top:10px">Pour ajouter un produit, entrez ses informations dans ce formulaire :</h2><br>
    <?php
    //Connexion à la BDD
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");
    if(isset($_POST['nom_produit']) AND isset($_POST['image']) AND isset($_POST['description']) AND isset($_POST['code_barre']) AND isset($_POST['quantite']) AND !empty($_POST['nom_produit']) AND !empty($_POST['image']) AND !empty($_POST['description']) AND !empty($_POST['code_barre']) AND !empty($_POST['quantite']))
{
    $nom_produit = $_POST['nom_produit'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $code_barre = $_POST['code_barre'];
    $quantite = $_POST['quantite'];
	$insert = $bdd->prepare('INSERT INTO produit(nom_produit, image, description, code_barre, quantite) VALUES(?, ?, ?, ?, ?)');
	$insert->execute(array($nom_produit, $image,$description, $code_barre, $quantite)); 
    ?><div style="text-align:center"><strong><em><?php echo "Les informations ont bien était traité" ?></em></strong></div><?php ; ?>
<?php }else ?><div style="text-align:center"><strong><em><?php echo "Il manque un ou plusieurs champs à compléter"?></em></strong></div><?php;
    ?>
    <form method="post" action="" style="text-align:center">
        <div>
            <label for="nom_produit"><em>Nom du Produit :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="nom_produit" id="nom_produit">
        </div>
        <div>
            <label for="Image"><em>Lien de l'image :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="image" id="image"></input>
        </div>
        <div>
            <label for="description"><em>Description du Produit :</em></label><br>
            <textarea style="border: 1px solid #22a311" type="text" name="description" id="description"></textarea>
        </div>
        <div>
            <label for="code_barre"><em>Code-barre :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="code_barre" id="code_barre">
        </div>
        <div>
            <label for="quantite"><em>Quantité :</em></label><br>
            <input style="border: 1px solid #22a311" type="text" name="quantite" id="quantite">
        </div><br>
        <button type="submit" class="btn btn-info" style="background-color: #22a311">Valider</button> 
    </form>
</body>
</html>