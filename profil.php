<?php
require_once "profil_param.php";
include ('traduction/localization.php');

// Initialiser la session
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Mon Profil</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	  	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="d-flex flex-column min-vh-100">
    <?php include('includes/header.php');?>
		<main class="col-12 py-md-3 pl-md-5" role="main">
				<div class="container">
			    <div class="row">
						<div class="col-12 py-md-3 pl-md-5">
		      		<h1 class="py-md-3 pl-md-5" style="padding-top: 0 !important"><?php echo $lang['monprofil'];?></h1>
							<div class="container py-md-3 pl-md-5 bg-light" style="border: 3px solid #22a311 !important">
								<div class="container">
									<div class="row">
										<div class="col-sm" style="padding-top: 10px;">
											<ul class="list-unstyled mb-0 py-3 pt-md-1">
												<h4 style="padding-bottom:10px"><?php echo $lang['vouspouvez'];?></h4>
												<li class="mb-1">
												<a type="button" class="w-100 btn btn-lg btn-outline-danger" style="background-color:#22a311; border-color:#22a311; color:white" href="réinitialisation_mdp.php"><?php echo $lang['reinitialisation'];?></a>
												</li>
												<li class="mb-1">
												<a type="button" class="w-100 btn btn-lg btn-outline-danger" style="background-color:#22a311; border-color:#22a311; color:white" href="fpdf184\recudon.php"><?php echo $lang['recudon'];?></a>
												</li>
												<!-- Afficher que pour les membres -->
												<?php
												if(isset($_SESSION['id']) && ($_SESSION['role'] == '0')){ ?>
												<li class="mb-1">
												<a type="button" class="w-100 btn btn-lg btn-outline-danger" style="background-color:#22a311; border-color:#22a311; color:white" href="rejoindre.php"><?php echo $lang['changerderole'];?></a>
												</li>
												<?php }?>
												<!-- Afficher que pour les membres -->
												<?php
												if(isset($_SESSION['id']) && ($_SESSION['role'] == '2')){ ?>
												<li class="mb-1">
												<a type="button" class="w-100 btn btn-lg btn-outline-danger" style="background-color:#22a311; border-color:#22a311; color:white" href="rejoindre.php"><?php echo $lang['changerderole'];?></a>
												</li>
												<?php }?>
												<!-- Afficher que pour les benevoles -->
												<?php
												if(isset($_SESSION['id']) && ($_SESSION['role'] == '3')){ ?>
												<li class="mb-1">
												<a type="button" class="w-100 btn btn-lg btn-outline-danger" style="background-color:#22a311; border-color:#22a311; color:white" href="rejoindre.php"><?php echo $lang['changerderole'];?></a>
												</li>
												<?php }?>
												<!-- Afficher que pour l'Admin -->
												<?php
                  								if(isset($_SESSION['id']) && ($_SESSION['role'] == '1')){ ?>
                   							 <li class="mb-1">
												<a type="button" class="w-100 btn btn-lg btn-outline-danger" style="background-color:#22a311; border-color:#22a311; color:white" href="fpdf184\recaplivraison.php"><?php echo $lang['recapitulatifcommande'];?></a>
											</li>
												<?php }?>
												<!-- Afficher que pour les bénévoles -->
												<?php
                  								if(isset($_SESSION['id']) && ($_SESSION['role'] == '3')){ ?>
                   							 <li class="mb-1">
												<a type="button" class="w-100 btn btn-lg btn-outline-danger" style="background-color:#22a311; border-color:#22a311; color:white" href="fpdf184\recaplivraison.php"><?php echo $lang['recapitulatifcommande'];?></a>
											</li>
												<?php }?>

											</ul>
										</div>
										<!-- <div class="col-sm">
		  								<img src="uploads/<?php echo $resultat['image']; ?>" class="img-thumbnail" style="width: 20rem;" alt="Photo de profil">
									</div> -->
									<div class="col-sm">
											<div>
												<h5 class="py-md-3 pl-md-5"><?php echo $lang['informations'];?></h5>
												<p><?php echo $lang['nom'];?> <?php echo $resultat['nom'] ?></p>
											  <p><?php echo $lang['prenom'];?> <?php echo $resultat['prenom'] ?></p>
											  <p><?php echo $lang['email'];?> <?php echo $resultat['email'] ?></p>
											  <!-- <p><?php echo $lang['pointdefidelite'];?><?php echo $resultat1['fidelite'] ?></p> -->
												<p><?php echo $lang['role'];?><?php
												if ($resultat['role']==0) {
													echo " Visiteur";
												}elseif ($resultat['role']==1) {
													echo " Administrateur";
												}elseif ($resultat['role']==2) {
													echo " Membre";
												}elseif ($resultat['role']==3) {
													echo " Bénévole";} ?></p>
												<p><?php echo $lang['membredepuis'];?> <?php echo $resultat['creer_a'] ?></p>
											</div>
									</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</main>
		<?php include('includes/footer.php'); ?>
	</body>
</html>
