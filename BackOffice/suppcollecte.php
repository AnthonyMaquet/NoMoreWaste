<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include '../bdd.php';
if(isset ($_GET['collecte_id']) AND !empty($_GET['collecte_id'])){
    $getid = $_GET['collecte_id'];
    $recupCollecte = $conn->prepare('SELECT * FROM collecte WHERE collecte_id = ?');
    $recupCollecte->execute(array($getid));
    if($recupCollecte->rowCount() > 0 ){
        $suppCollecte = $conn->prepare('DELETE FROM collecte WHERE collecte_id = ?');
        $suppCollecte ->execute(array($getid));
        header('Location: ../collecte.php');
    }else{
        echo "Aucun membres n'a été trouvé ";

    }
}else{

    echo "L'identifiant n'a pas été récuperé";

}
?> 