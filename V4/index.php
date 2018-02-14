<?php
$action=$_GET["action"];
switch ($action) {
    case "":
        require('./controleur/auteurControleur.php');
        connexionAuteur();
        break;
    case "liste":
        require('./controleur/articleControleur.php');
        lister();
        break;
    case "ajouter":
        require('./controleur/articleControleur.php');
        add();
        break;
    case "deco":
        require('./controleur/auteurControleur.php');
        deconnexion();
        break;
    case "json":
        require('./controleur/articleControleur.php');
        listerJson();
        break;
}
?>