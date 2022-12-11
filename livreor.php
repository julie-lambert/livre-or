<?php

include 'header.php';
include 'connect.php';


$request = $conn -> query("SELECT * FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC");




foreach($request as $ligne=>$values){
    

 echo  '<div class ="container">
        <div class = "container1">
         <p> Poster le  '. $values['date'] . " par " . $values['login'] ."<br><br>" . $values['commentaire'] . "<br><br>" ;

      '</div>
        </div>
        <p> ';
          

}   
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="livreor.css">
</head>
<body>
    
</body>
</html>