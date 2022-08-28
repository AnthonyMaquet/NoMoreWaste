<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include '../bdd.php';
if(isset ($_GET['produit_id']) AND !empty($_GET['produit_id'])){
    $getid = $_GET['produit_id'];
    $recupProduit = $conn->prepare('SELECT * FROM produit WHERE produit_id = ?');
    $recupProduit->execute(array($getid));
    if($recupProduit->rowCount() > 0 ){
        $suppProduit = $conn->prepare('DELETE FROM produit WHERE produit_id = ?');
        $suppProduit ->execute(array($getid));
        header('Location: produit_list.php');
    }else{
        echo "Aucun membres n'a été trouvé ";

    }
}else{

    echo "L'identifiant n'a pas été récuperé";

}
?> 