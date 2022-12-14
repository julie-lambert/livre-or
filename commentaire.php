<?php

include 'header.php';
include 'connect.php';
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";
$conn = new mysqli($servername, $username, $password, $dbname);*/
// connexion à la base de donnée
$sql = "SELECT * FROM `commentaires`";
$query = $conn -> query($sql);
$users = $query -> fetch_all();
//var_dump($users);//tout le temps important fait le merde !!!



$sql2 = "SELECT * FROM `utilisateurs`";
$query1 = $conn -> query($sql2);
$users1 = $query1 -> fetch_all();

//var_dump($users1);



if(isset($_POST["Envoyer"])){
    if(!empty($_POST["commentaire"])){

        $commentaire = htmlspecialchars($_POST["commentaire"], ENT_QUOTES);
        $sessionId = ($_SESSION["id"]);
        $date = date('Y/m/d H:i:s');


        if(isset($_SESSION['login'])){

        $bdd = "INSERT INTO `commentaires`( `commentaire`, `id_utilisateur`,`date`) VALUES ('$commentaire','$sessionId','$date')";
        $query2 = $conn -> query($bdd);

      echo "Commentaire ajouté";

        }
    }

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="commentaire.css">
</head>
<body>
    <div class = "container">
        <div class="form1">
            <form  method = "post" action="commentaire.php">
                  <p>Commentaire</p>
                <input type="text" name="commentaire" placeholder="Ecrivez votre commentaire">
                <br><br>
                <input type="submit" name="Envoyer" value="Envoyer">
            </form>
        </div> 
        <div class="drop drop-1"></div> 
        <div class="drop drop-2"></div> 
        <div class="drop drop-3"></div> 
        <div class="drop drop-4"></div> 
        <div class="drop drop-5"></div> 

    </div>
</body>
</html>