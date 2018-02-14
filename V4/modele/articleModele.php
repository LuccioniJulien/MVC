<?php
require('./connexionDB.php');
class Article {

    private $titre;
    private $contenu;
    private $id_auteur;
    private $today;

    function __construct($titre,$contenu,$id_auteur) {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->id_auteur = $id_auteur;
        $this->today = date("Ymd");
    }

    function ajouter()
    {
        $db = bdd();
        $sql = "INSERT INTO ARTICLE (titre, contenu, dateArticle, id_auteur)
        VALUES ( '$this->titre','$this->contenu','$this->today','$this->id_auteur')";
        return $db->query($sql);
    }

    static function getList()
    {
        $db = bdd();
        $sql = "SELECT titre,contenu,dateArticle,nom,prenom,AUTEUR.id_auteur FROM ARTICLE,AUTEUR WHERE ARTICLE.id_auteur=AUTEUR.id_auteur ORDER BY dateArticle DESC";
        $result = mysqli_query($db, $sql);
        return $result;
    }
}
?>