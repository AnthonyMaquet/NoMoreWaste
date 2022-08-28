<?php
include ('traduction/localization.php');

if (isset($_POST['prix']) && !empty($_POST['prix'])){
    require_once('vendor/autoload.php');
    include ('traduction/localization.php');

    $prix = (float)$_POST['prix'];

    //Instanciation Stripe
    \Stripe\Stripe::setApikey('sk_test_51KwQN9LFbORONtLjiIrKCh7OjFiWtFYLEPehoBPMusX6sblJcsCR0eiOjTFrLhhpe8E7wEMttbgagzL5Ul3biCub00qs6seSEi');

    $intent = \Stripe\PaymentIntent::create([  //on crée l'intention de paiement
        'amount' => $prix*100, //pour mettre en centime
        'currency' => 'eur' //devise = euro
    ]);
}
// else{
//     header('Location: /index2.php');
// }
?>

<header>
    <nav class="navbar navbar-expand-sm bg-white fixed-top">
    <div class ="collapse navbar-collapse justify-content-between">

        <ul class="navbar-nav">
            <div class ="collapse navbar-collapse justify-content-between">
                <a href="index.php"><img src="image/Logo.jpg" style="width:60px" ></a>
                <h1><a href="index.php"><span class="badge badge-danger" style="background-color:#22a311 !important"><?php echo $lang['bienvenue'];?></span></a></h1>
            </div>
        </ul>
  <div>
        <a href="index.php?lang=fr"><img src="https://i.pinimg.com/736x/69/a3/40/69a340dd8937b1942659090a48531c76.jpg" width="20rem" height="20rem"></a>
        <a href="index.php?lang=en"><img src="https://www.le-monde-du-stickers.fr/7737/sticker-drapeau-anglais.jpg" width="20rem" height="20rem"></a>
</div>
        <div class="form-inline">
            <?php if(isset($_SESSION['id'])): ?>
                <b style="padding-right:20px;"><?php echo $lang['bonjour'];?> <?php echo $_SESSION['prenom']; ?>, voici votre page de paiement<br>
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
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="echangeservice.php">Echange de service</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="BackOffice/index.php">Back Office</a></li>';
                }elseif(isset($_SESSION['id']) && ($_SESSION['role'] == '2')){
                    echo '<li class="nav-item"><a class="dropdown-item" href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="profil.php">Mon profil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="needaide.php">Besoin d\'aide ?</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="echangeservice.php">Echange de service</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="BackOffice/index.php">Back Office</a></li>';
                }elseif(isset($_SESSION['id']) && ($_SESSION['role'] == '3')){
                    echo '<li class="nav-item"><a class="dropdown-item" href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="profil.php">Mon profil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="echangeservice.php">Echange de service</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="BackOffice/index.php">Back Office</a></li>';
                }elseif(isset($_SESSION['id']) && ($_SESSION['role'] == '0')){
                    echo '<li class="nav-item"><a class="dropdown-item" href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="profil.php">Mon profil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="rejoindre.php">Nous rejoindre</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="conseilantigaspi.php">Conseils anti-gaspi</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="courscuisine.php">Cours de cuisine</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item" href="echangeservice.php">Echange de service</a></li>';
                }/*else{
                    echo '<li class="nav-item"><a class="dropdown-item"  href="index.php">Accueil</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item"  href="webgl.php">WebGL</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item"  href="location.php">Forfaits</a></li>';
                    echo '<li class="nav-item"><a class="dropdown-item"  href="boutique.php">Boutique</a></li>';
                }*/
								?>

                </div>
            </div>
        </div>

    </div>
    </nav><br /><br /><br /><br />
<div>
        <p><?php echo $lang['descriptionheader'];?></p>
    </div>
</header>
<hr>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <title>Paiement</title>
    </head>
<body>
    <h3 style="text-align: center;">Veuillez entrer vos informations bancaire :</h3>
    <br>
    <form method="post" style="padding: 0px 30px;">
            <div id="errors"></div> <!-- Message d'erreur-->
            <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
            <div id="card-elements"></div> <!-- info de la carte-->
            <div id="card-errors" role="alert"></div> <!-- Message d'erreur : type :mauvaise date d'expiration ... -->
            <br>
</form>
<button class="w-100 btn btn-lg btn-danger" id="card-button" type="button" data-secret="<?=$intent['client_secret']?>" style="background-color:#22a311; border-color:#22a311">Procéder au paiement</button> <!-- On récupère le numéro secret qui est envoyé par stripe id de la commande + clé secrete qui sert à valider le paiement -->

    <script src="https://js.stripe.com/v3/"></script>       
    <script src="js/scriptpaiement.js"></script>
<?php include('includes/footer.php');?>    
    </body>
</html>