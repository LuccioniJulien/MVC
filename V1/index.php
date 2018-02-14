<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<?php 
if (!isset($_POST['submit'])) {
    ?>
        <form name="envoyer" action="" method="post">
            <label>Login</label>
            <input name="login" type="text"></input>
            <label>Mdp</label>
            <input name="mdp" type="password"></input>
            <input type="submit" value="Connexion" name="submit">
        </form>
<?php

} else {
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    try {
        $conn = mysqli_connect("localhost", "root", "root", "Articles");
        $login = str_replace('\'', '"', $login);
        $mdp = str_replace('\'', '"', $mdp);
        $sql = "SELECT * FROM AUTEUR WHERE login='$login'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $prenom = $row["prenom"];
        $nom = $row["nom"];
        $password = $row["mdp"];
        if ($mdp == $password) {
            //on enregistre l'id et le login dans des variables de session
            $_SESSION['login'] = $row["login"];
            $_SESSION['id'] = $row["id_auteur"];
            echo "Bienvenue " . $prenom . " " . $nom;
            echo "<br/>";
            echo '<a href="listeArticles.php" class="button">Continuer</a>';
        } else {
            echo 'Erreur de login ou de mdp';
            echo "<br/>";
            echo '<a href="index.php" class="button">réessayer</a>';
        }
        $conn->close();
    } catch (Exception $ex) {
        echo $ex;
    }
}
?>
</body>

</html>

