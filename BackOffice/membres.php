<?php
session_start();
include '../bdd.php';
if($_SESSION['role'] != '1'){
    header('Location:login.php');
  }

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//Traitement barre de recherche :
@$keywords=$_GET["keywords"];
@$valider=$_GET["valider"];
if(isset($valider) && !empty(trim($keywords))){
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=rattrapage;charset=utf8", "root", "");
    $res=$bdd->prepare("SELECT * FROM utilisateurs WHERE nom like '%$keywords%'");
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute();
    $tab=$res->fetchAll();
    $afficher="oui";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Back Office</title>
</head>
<body>

<?php include('includes/header.php')?>

<div style="text-align:left; padding-left:15px; padding-top:5px">
    <h3>Back Office</h3>
</div>

<!-- Barre de Recherche -->
<div style="display: flex; justify-content: center; align-items:center">
    <h5>Recherche rapide :</h5> 
</div>
<div style="display: flex; justify-content: center; align-items:center">
    <form name="fo" method="get" action=""> <!-- Méthode Get pour visualiser les mot clés saisies dans l'URL-->
        <input style="border: 2px solid #22a311" type="text" name="keywords" value="<?php echo $keywords ?>" placeholder="Nom de la personne"/> <!-- zone de texte pour saisir les mots clé -->
        <input type="submit" name="valider" value="Rechercher" class="btn" style="background-color:#22a311; border-color:#22a311; color:white"/> <!-- soumettre le formulaire au serveur -->
    </form>
</div><br>
<?php if(@$afficher=="oui") { ?>
<!-- Zone de résultat -->
<div id="resultats" style="display: flex; justify-content: center; align-items:center">
    <div id="nbr"><?=count($tab)."".(count($tab)>1?" résultats trouvés :":" résultat trouvé ")?></div> <!-- Nombre de résultat -->
</div>
<div style="display: flex; justify-content: center; align-items:center">
    <ol>
        <?php for($i=0;$i<count($tab);$i++){ ?>
        <ul><strong><?php echo $tab[$i]["nom"]?> <?php echo $tab[$i]["prenom"]?> <?php echo $tab[$i]["email"]?></strong></ul>
        <?php } ?>
    </ol>
</div>
<?php } ?>

<!-- Description page -->
<div style="padding-top:20px;" class="container">
    <h2>Liste de tous les membres de l'association</h2>
<!-- Liste -->
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $recupUsers = $conn->query('SELECT * FROM utilisateurs order by id desc');
            while($user = $recupUsers->fetch()){
            ?>
                <tr>
                    <td><?= $user['nom'];?></td>
                    <td><?= $user['prenom'];?></td>
                    <td><?= $user['email'];?></td>
                    <?php 
                    if($user['role']==0){
                        echo'<td>Visiteur</td>';
                    }elseif($user['role']==1){
                        echo'<td>Administrateur</td>';
                    }elseif($user['role']==2){
                        echo'<td>Membre</td>';
                    }elseif($user['role']==3){
                        echo'<td>Bénévole</td>';
                    }?>
                    <td><?= $user['creer_a'];?></td>
                    <td><a href="bannir.php?id=<?=$user['id']; ?>" class="btn" style="background-color:#22a311; border-color:#22a311; color:white" onClick='return confirm("Vous êtes sur ?")'>Supprimer ce compte</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>