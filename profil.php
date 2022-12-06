


<?php

include 'header.php';

$servername = "localhost";
$username = "root";
$password_serveur = "";
$dbname = "livreor";
$conn = new mysqli('localhost', 'root', "", 'livreor');


$login = $_SESSION['login']; 

if(!empty($_SESSION)) { 
    $bdd = "SELECT * FROM utilisateurs WHERE login='$login'";
    $query = $conn->query($bdd);
    $users= $query->fetch_assoc(); 
    $login_bdd = $users['login']; 
    $password = $users['password'];

    if (isset($_POST['submit'])) { 
        

       
        if ($login != $_POST['login']) {
            $bdd1 = "UPDATE `utilisateurs` SET login='{$_POST['login']}' WHERE login='$login'";
            $users1 = $conn->query($bdd1);
            echo "Votre login a bien été changé par:" . $_POST['login'] . "<br>";
        }if ($password != $_POST['password']) {
            $new_password = ($_POST['password']);
            $bdd2 = "UPDATE `utilisateurs` SET password='$new_password' WHERE password='$password'";
            $users2 = $conn->query($bdd2);
            echo "Votre mot de passe a bien été changé par:" . $_POST['password'] . "<br>";
        }

    }

}
if (isset($_POST['delete'])) {
    $sql_delete = "DELETE FROM utilisateurs WHERE login='$login'";
    $result_delete = $bdd->query($sql_delete);
    echo "Vos données ont été supprimées";
    session_destroy();
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style_profil.css">
    <title>Page de profil</title>
</head>

<header>
<div class="profil"><h2><strong>Votre profil</strong></h2></div>
        <br>
</header>

<body>
        <div class="form1">
            <form  method = "post" action="test.php">
              
                <input type="text" name="login" placeholder="<?php echo $users['login'] ?>">
                <br><br>
                <input type="password" name="password" placeholder="<?php echo $users['password'] ?>">
                <br><br>

                <br><br>
                <input type="submit" name="submit" value="Modifier">
            </form>
        </div> 
</body>
</html>