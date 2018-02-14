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
$sql = "SELECT * FROM ARTICLE,AUTEUR WHERE ARTICLE.id_auteur=AUTEUR.id_auteur ORDER BY dateArticle DESC";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
include('liste-Affichage.php');
?>