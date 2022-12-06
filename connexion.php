<?php

include 'header.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";

$conn = new mysqli($servername, $username, $password, $dbname); // connexion à la base de donnée

$sql = "SELECT * FROM `utilisateurs`";
$query = $conn -> query($sql);
$users = $query -> fetch_all();


    if($_POST != NULL){
        //echo "bonjour<br>";
        $login= htmlspecialchars($_POST["username"]);
        $mdp = htmlspecialchars($_POST["password"]);
        
        for($i=0; isset($users[$i]); $i++){
            
            
            if($users[$i][1] === $login){
                //echo "Login ok<br>";
                if($users[$i][2] === $mdp){
                    $_SESSION['login'] = $login;
                    //echo"Connexion réussie<br>";

                        header('location: index.php');
                    
                }
                else{
                    echo"mauvais mdp";
                }
                break;    
            }
            else{
                echo"Mauvais login<br>";
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
        <title>Connexion</title>
        <link rel="stylesheet" href="connexion.css">
    </head>
   
    <body>
        <div class="form1">
            <form action="" method="POST">
                <p>Connexion</p>
            <input type="text" placeholder="login" name="username" >
            <br><br>
            <input type="password" placeholder="password" name="password" >
            <br><br>
            <input type="submit" id='submit' value='Se connecter' >
            </form>
        </div> 
    </body>
</html>