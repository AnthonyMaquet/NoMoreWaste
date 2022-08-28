<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="../css/style.css">
      <link rel="stylesheet" type="text/css" href="../styleboutique.css">
</meta>

<header>
<?php if(isset($_SESSION['id']) && ($_SESSION['role'] == '1')){?>
  <nav class="navbar navbar-expand-lg" style="background-color:green; !important">
    <a class="navbar-brand align-middle" style="color:white" href="../index.php">NO MORE WASTE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Produits
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="ajout_produit.php">Ajouter un produit</a>
            <a class="dropdown-item" href="produit_list.php">Modifier un produit</a>
        </li>

<?php }?>
        <div style="padding-left:500px">
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

