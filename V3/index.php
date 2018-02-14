<?php
require('indexBdd.php');
if (isset($_POST['submit'])) {
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    $row = connexion($login);
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