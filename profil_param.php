<?php 
session_start(); 
//Connexion à la base de données
require_once "bdd.php"; 
 
//Vérifiez si l'utilisateur est connecté, sinon redirigez-vous vers la page de connexion 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ 
    header("location: login.php"); 
    exit;  
} 

//On récupère toutes les données que l'on souhaite afficher sur la page de profil
$q = 'SELECT nom, prenom, email, role, creer_a FROM utilisateurs WHERE id= :id' ;
$req = $conn->prepare($q); 
$req->execute([ 
'id' => $_SESSION['id'] 
]); 
$resultat = $req->fetch(); 
?> 
