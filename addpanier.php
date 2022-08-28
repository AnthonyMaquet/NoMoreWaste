<?php
require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier();

$json = array('error' => true);
//ajout au panier
if(isset($_GET['produit_id'])){
    $produit = $DB->query('SELECT produit_id FROM produit WHERE produit_id=:produit_id', array('produit_id' => $_GET['produit_id']));
    if(empty($produit)){
        $json['message'] = "Ce produit n'existe pas";
    }
    $panier->add($produit[0]->produit_id);
    $json['error'] = false; //Il n'y a pas eu d'erreur
    $json['message'] = 'Le produit à bien était ajouté a la commande'; //Message de succès d'ajout au panier
}else{
    $json['message'] ="vous n'avez rien choisis";
}
echo json_encode($json); //affiche le résultat
?>