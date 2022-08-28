<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include '../bdd.php';
if(isset ($_GET['demande_id']) AND !empty($_GET['demande_id'])){
    $getid = $_GET['demande_id'];
    $recupDemandedaide = $conn->prepare('SELECT * FROM demandedaide WHERE demande_id = ?');
    $recupDemandedaide->execute(array($getid));
    if($recupDemandedaide->rowCount() > 0 ){
        $suppDemandedaide = $conn->prepare('DELETE FROM demandedaide WHERE demande_id = ?');
        $suppDemandedaide ->execute(array($getid));
        header('Location: ../personneendetresse.php');
    }else{
        echo "Aucun membres n'a été trouvé ";

    }
}else{

    echo "L'identifiant n'a pas été récuperé";

}
?> 