<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

/*if(!isset($_SESSION["role"]) || $_SESSION["role"] !== '1'){
    header("location: index.php");
    exit; 
}*/
include '../bdd.php';
if(isset ($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUser = $conn->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0 ){
        $bannirUser = $conn->prepare('DELETE FROM utilisateurs WHERE id = ?');
        $bannirUser ->execute(array($getid));
        header('Location: membres.php');
    }else{
        echo "Aucun membres n'a été trouvé ";

    }
}else{

    echo "L'identifiant n'a pas été récuperé";

}
?> 