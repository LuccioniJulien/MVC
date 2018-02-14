<?php
require('connexionDB.php');
function ajouter($titre, $contenu, $today, $id_auteur)
{
    $db = bdd();
    $sql = "INSERT INTO ARTICLE (titre, contenu, dateArticle, id_auteur)
    VALUES ( '$titre','$contenu','$today','$id_auteur')";
    return $db->query($sql);
}
?>