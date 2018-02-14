<?php
require('connexionDB.php');
function getList()
{
    $db = bdd();
    $sql = "SELECT * FROM ARTICLE,AUTEUR WHERE ARTICLE.id_auteur=AUTEUR.id_auteur ORDER BY dateArticle DESC";
    $result = mysqli_query($db, $sql);
    return $result;
}
?>