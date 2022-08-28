<?php
require_once "profil_param.php";
require_once "bdd.php";
include ('traduction/localization.php');

$q2 = 'SELECT * FROM don WHERE don_id= 1' ;
$req2 = $conn->prepare($q2);
$req2->execute([
]);
$resultat2 = $req2->fetch();

$montantdon = $resultat2['prix'];
$id = $_SESSION['id'];
$updateMontantDon = $conn->prepare('UPDATE utilisateurs SET montantdon = ? WHERE id = ?' );
$updateMontantDon->execute(array($montantdon, $id)); 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <title>Don de 5€</title>
    </head>
    <body>
    <?php include('includes/header.php'); ?>
    <section style="text-align: center;">
        <h1>Validez-vous votre don ?</h1>
        <br>
        <form action="paiement.php" method="post">
            <label for="prix">Montant :</label>
            <input type="text" name="prix" id="prix" value="<?php echo $resultat2['prix'] ?>" />€
<br>
<br>
            <button class="w-100 btn btn-lg btn-danger" style="background-color:#22a311; border-color:#22a311" href="paiement.php">Procéder au don</button>
        </form>
        <a style="color: #22a311;" style="text-align: center;" href="index.php">Non</a>
    <script src="js/function.js"></script>
</section>
<?php include('includes/footer.php'); ?>
    </body>
 
</html>

