<?php
require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier();
?>

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
                <b style="padding-right:20px;"><?php echo $lang['bonjour'];?> <?php echo $_SESSION['prenom']; ?>, <?php echo $lang['vousetes'];?><br> <p> <?php echo $lang['un'];?> <?php
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
                    echo '<li class="nav-item"><a class="dropdown-item" href="collecte.php">Points de collecte de don</a></li>';
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
                    echo '<li class="nav-item"><a class="dropdown-item" href="collecte.php">Points de collecte de don</a></li>';
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
