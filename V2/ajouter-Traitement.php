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

if (empty($_SESSION['id'])) {
    header("Location: index.php");
    die();
}
if (isset($_POST['submit']) && !empty($_POST['titre']) && !empty($_POST['contenu'])) {
    $today = date("Ymd");
    $titre = str_replace('\'', '"', $_POST['titre']);
    $contenu = str_replace('\'', '"', $_POST['contenu']);
    $id_auteur = $_SESSION['id'];
    $sql = "INSERT INTO ARTICLE (titre, contenu, dateArticle, id_auteur)
        VALUES ( '$titre','$contenu','$today','$id_auteur')";
    $bool = $db->query($sql);
}
include('ajouter-Affichage.php');

?>