<?php
session_start();
try {
    $db = mysqli_connect("localhost", "root", "root", "Articles");
    if (!$db) {
        throw new Exception('bdd indisponible');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['submit'])) {
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    $sql = "SELECT * FROM AUTEUR WHERE login='$login'";
    $result = mysqli_query($db, $sql);
    $row = $result->fetch_assoc();
    $prenom = $row["prenom"];
    $nom = $row["nom"];
    $password = $row["mdp"];
    if ($mdp == $password) {
        $_SESSION['login'] = $row["login"];
        $_SESSION['id'] = $row["id_auteur"];
    }
}
include('index-Affichage.php');

?>