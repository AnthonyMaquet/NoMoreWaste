<?php
session_start();
include_once("fonctions-panier.php");
include ('traduction/localization.php');
include 'includes/header.php';


// $nbArticles=count($_SESSION['panier']['libelleProduit']);
//        if ($nbArticles <= 0)
//        echo "<tr><td>Votre panier est vide </ td></tr>";
//        else
//        {
//           for ($i=0 ;$i < $nbArticles ; $i++)
//           {
//              echo "<tr>";
//              echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
//              echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
//              echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
//              echo "</tr>";
//           }

//           echo "<tr><td colspan=\"2\"> </td>";
//           echo "<td colspan=\"2\">";
//           echo "le total  de votre dernière commande est de :".MontantGlobal(); echo "€";
//           echo "</td></tr>";
//        }
echo '<?xml version="1.0" encoding="utf-8"?>';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Historique commande </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<form method="post" action="panier.php">
<table style="text-align: center;">

<h2 style="padding-left:600px;">Historique de commande</h2>
<p style="padding-left:15px;">Voici votre dernière commande passée chez nous :</p>
    <tr>
        <td>Nom du produit</td>
        <td>Quantité</td> 
        <td>Prix Unitaire</td>
    </tr>
    <?php
       $nbArticles=count($_SESSION['panier']['libelleProduit']);
       if ($nbArticles <= 0)
       echo "<tr><td>Votre panier est vide </ td></tr>";
       else
       {
          for ($i=0 ;$i < $nbArticles ; $i++)
          {
             echo "<tr>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</td>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
             echo "</tr>";
          }

          echo "<td colspan=\"2\">";
          echo "Le total de votre dernière commande est de ".MontantGlobal(); echo "€";
       }
    ?>
            <br>
            <a href="profil.php" type="button" class="w-100 btn btn-lg btn-outline-danger" style="margin-left: 30px; margin-top: 10px;">Retour</a>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</table>
</form>
</body>

<?php include 'includes/footer.php' ?>

</html>