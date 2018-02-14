<?php
require('./modele/auteurModele.php');

function connexionAuteur()
{
    if (isset($_POST['submit'])) {
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];

        $row = Auteur::connexion($login);
        
        $prenom = $row["prenom"];
        $nom = $row["nom"];
        $password = $row["mdp"];
        if ($mdp == $password) {
            $_SESSION['login'] = $row["login"];
            $_SESSION['id'] = $row["id_auteur"];
        }
    }
    include('./vue/connexion-Affichage.php');
}
function deconnexion()
{
    session_start();
    session_destroy();
    include('./vue/deconnexion-Affichage.php');
}
?> 