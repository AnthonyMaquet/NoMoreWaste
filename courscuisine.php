<?php
require_once "bdd.php";
require_once "profil_param.php";
include ('traduction/localization.php');

// $q = 'SELECT * FROM article WHERE statut = 1;
// $req = $conn->prepare($q);
// $req->execute();
// ?>

<!DOCTYPE html>

<html lang="fr" dir="ltr">
<head>
		<title>Cours de cuisine</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
<?php include('includes/header.php'); ?>
    <div class="position-relative overflow-hidden p-3 m-md-3 text-center bg-light" style="background-image:url(image/coursdecuisine.jpg); margin:0 !important">
    <div class="col-md-5 p-lg-5 mx-auto my-5" style="background:grey">
      <h1 class="display-4 fw-normal" style="color:white"><?= $lang['coursdecuisine'];?></h1>
      <p class="lead fw-normal" style="color:white"><?= $lang['desccoursdecuisine'];?></p>
    </div>
  </div>

<!-- Vidéo Cours de cuisine -->
<div>
<iframe width="503" height="280" src="https://www.youtube.com/embed/XLMR-ASf4KM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<iframe width="503" height="280" src="https://www.youtube.com/embed/gN8SuCiDPKo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<iframe width="503" height="280" src="https://www.youtube.com/embed/TH7ouuJYohk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
</div>
  <!-- Recette 1 -->
<div style="padding-left:20px; text-align:center; background-image:url(image/painperdu.jpg); background-size:28%">
<br><br>
<div class="container py-md-3 pl-md-5 bg-light">
<span style="text-align:left"><h2><em>Le Pain Perdu</em></h2></span>
  <h5><em><strong>Informations :</strong></h5>
  <p>Niveau de difficulté : Très facile<br>
  Temps de préparation : 15 minutes<br>
  Temps de cuisson : 20 minutes</p>
  <h5><strong>Ingrédients :</strong></h5>
  <p>8 tranches de Pain<br>
  50cl de Lait /100g de Sucre<br>
  1 sachet de Sucre Vanillé<br>
  2 Oeufs / 50g de Beurre</em></p>
  <h5><em><strong>Réalisations :</strong></h5>
  <p>1. Dans un plat large, fouettez 50 g de sucre, le sucre vanillé et les oeufs entiers, puis versez le lait.<br>
  2. Plongez les tranches de pain dans le mélange quelques minutes pour les imbiber.<br>
  3. Faites fondre le beurre dans une poêle jusqu’à ce qu’il mousse. Déposez-y les tranches et faites-les cuire 3 à 4 min de chaque côté, jusqu’à ce qu'elles soient bien dorées.<br>
  4. Retirez-les à l’aide d’une spatule et disposez-les sur les assiettes. Saupoudrez du reste de sucre et dégustez aussitôt.</em></p> 
</div>
<br>
</div>

<!-- Recette 2 -->
<div style="padding-left:20px; text-align:center; background-image:url(image/gratin.jpg); background-size:30%">
<br>
<div class="container py-md-3 pl-md-5 bg-light">
<span style="text-align:left;"><h2><em>Gratin de pâtes, façon carbonara</em></h2></span>
  <h5><em><strong>Informations :</strong></h5>
  <p>Niveau de difficulté : Facile<br>
  Temps de préparation : 15 minutes<br>
  Temps de cuisson : 25 minutes</p>
  <h5><strong>Ingrédients :</strong></h5>
  <p>400g Pâte type ziti<br>
  12 fines tranches Guanciale ou pancetta<br>
  4 Jaunes d'oeufs / 40g Pecorino romano<br>
  1/2L Béchamel / Sel et Poivre</em></p>
  <h5><em><strong>Réalisations :</strong></h5>
  <p>1. Commencez par faire précuire les pâtes 10 min dans de l’eau bouillante salée. Égouttez-les. Étalez la moitié de la béchamel dans un plat à gratin, déposez les pâtes en les alignant soigneusement. Recouvrez de pecorino râpé puis de béchamel à nouveau.<br>
  2. Enfournez le gratin 15 min à 180 °C (th. 6). Formez 4 petits nids avec les tranches de guanciale, 3 tranches par nid. Déposez-les dans une poêle et faites-les suer 1 à 2 min, le temps que la guanciale devienne translucide.<br>
  3. Déposez les nids de guanciale sur le gratin, placez les jaunes d’oeufs au centre, salez et poivrez. Servez aussitôt un peu de gratin, un nid de guanciale et son jaune d’oeuf, que chaque convive mêlera à son goût.<br>
</em></p> 
</div>
<br>
</div>

<!-- Recette 3 -->
<div style="padding-left:20px; text-align:center; background-image:url(image/chipspommes.jpg); background-size:25%">
<br>
<div class="container py-md-3 pl-md-5 bg-light">
<span style="text-align:left;"><h2><em>Chips d’épluchures de pomme</em></h2></span>
  <h5><em><strong>Informations :</strong></h5>
  <p>Niveau de difficulté : Très facile<br>
  Temps de préparation : 10 minutes<br>
  Temps de cuisson : 30 minutes</p>
  <h5><strong>Ingrédients :</strong></h5>
  <p>30g de Beurre<br>
  1/2 cuillère à café Mélange d’épices (cannelle, quatre-épices ou gingembre…)<br>
  Des épluchures de pomme<br>
  1 cuillère à soupe Sucre</em></p>
  <h5><em><strong>Réalisations :</strong></h5>
  <p>1. Commencez cette recette de chips d'épluchures de pomme en faisant fondre le beurre. Mélangez-le avec les épices.<br>
  2. Dans un saladier, arrosez les épluchures de pomme de beurre épicé, saupoudrez-les avec un peu de sucre et mélangez bien.<br>
  3. Placez les épluchures sur la plaque du four couverte de papier sulfurisé. Enfournez 30 à 40 min à 120 °C, en remuant plusieurs fois en cours de cuisson.<br>
</em></p> 
</div>
<br><br>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>
