<?php
require_once "profil_param.php";
include 'bdd.php';
include ('traduction/localization.php');

//Pour devenir bénévole ou membre
$id =  ($_SESSION['id']);
$recupUsers = $conn->query("SELECT * FROM utilisateurs WHERE id = $id");
while($user = $recupUsers->fetch()){
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>NO MORE WASTE</title>
		<meta charset="utf-8">
		<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="meteo.css">

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="carte/app.css">
		
	</head>
	<body>
	<?php include 'includes/header.php' ?>

<main style="background-image:url(image/nousrejoindre2.jpg); color: white; background-size: cover;">
			<div class="container text-center py-5 background" >
                <h1><strong>En savoir un peut plus sur nous</strong></h1>
                <div class="row justify-content-center align-items-center">
                        <div class="meteo_desc text-center">
                        <p>L’idée de base de l’association est de récolter tous les jours les invendus commerciaux, ou les 
						produits atteignant la date limite de consommation chez les particuliers : sur demande, des camions 
						partent du siège de l’association, récupèrent les produits et les ramènent dans un bâtiment 
						d’entreposage. Des tournées sont ensuite réalisées pour redistribuer partout où c’est nécessaire.</p>
                		</div>
            	</div>
				<div>
				<h1><strong>Si vous avez besoin d'aide</strong></h1>
				<p>N'hésitez pas à devenir membre de l'association en cliquant ici, nous somme la pour vous aider :</p>
				<a href="BackOffice/role.php?role=2&id=<?=$user['id']; ?>" class="btn btn-secondary" style="background-color: #22a311" onClick='return confirm("Êtes-vous sur de vouloir devenir membre ?")'>Membre</a>
				</div>
				<div>
				<h1><strong>Si vous souhaitez devenir bénévole :</strong></h1>
				<p>N'hésitez pas à venir en aide à l'association en devenant bénévole en cliquant sur ce bouton :</p>
				<a href="BackOffice/role.php?role=3&id=<?=$user['id']; ?>" class="btn btn-info" style="background-color: #22a311" onClick='return confirm("Êtes-vous sur de vouloir devenir bénévole ?")'>Bénévole</a>
				<?php } ?>
				</div>
				<div style="padding-top:50px">
				<p>*Une fois votre choix effectué, pensez à vous déconnecter et à vous reconnecter pour que votre choix soit prit en considération.</p>
				</div>
			</div>
</form>
		</main>
	<?php include 'includes/footer.php' ?>
	<script src="carte/app.js"></script>
	</body>
</html>
