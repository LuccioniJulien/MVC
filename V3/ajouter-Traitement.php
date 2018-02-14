<?php
require('ajouterBdd.php');
if (empty($_SESSION['id'])) {
    header("Location: index.php");
    die();
}
if (isset($_POST['submit']) && !empty($_POST['titre']) && !empty($_POST['contenu'])) {
    $today = date("Ymd");
    $titre = str_replace('\'', '"', $_POST['titre']);
    $contenu = str_replace('\'', '"', $_POST['contenu']);
    $id_auteur = $_SESSION['id'];
    $bool = ajouter($titre, $contenu, $today, $id_auteur);
}
include('ajouter-Affichage.php');
?>