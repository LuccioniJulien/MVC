<?php
require('./modele/articleModele.php');
if (empty($_SESSION['id'])) {
    header("Location: index.php");
    die();
}

function add()
{
    if (isset($_POST['submit']) && !empty($_POST['titre']) && !empty($_POST['contenu'])) {
        $article = new Article($_POST['titre'],$_POST['contenu'],$_SESSION['id']);
        $bool = $article->ajouter();
    }
    include('./vue/ajouter-Affichage.php');
}

function lister()
{
    $result = Article::getList();
    include('./vue/liste-Affichage.php');
}

function listerJson()
{
    $result = Article::getList();
    while ($row = $result->fetch_assoc()) {
        $Array[] = $row;
    }
    include('./vue/jsonListeArticles-Affichage.php');
}
?>