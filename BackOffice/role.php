<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include '../bdd.php';
if(isset ($_GET['id']) AND !empty($_GET['id']) AND isset ($_GET['role']) AND !empty($_GET['role'])){
    $getid = $_GET['id'];
    $getrole = $_GET['role'];
    $recupUser = $conn->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0 ){
        $roleUser = $conn->prepare('UPDATE utilisateurs SET role = ? WHERE id = ?');
        $roleUser ->execute(array($getrole,$getid));
        header('Location: ../rejoindre.php');
    }else{
        echo "Aucun membres n'a été trouvé ";

    }
}else{

    echo "L'identifiant n'a pas été récuperé";

}
?> 