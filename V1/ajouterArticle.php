<?php
session_start();
if (empty($_SESSION['id'])) {
    header("Location: http://localhost:8888/V1");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un article</title>
</head>
<body>
<?php 
if (!isset($_POST['submit']) || empty($_POST['titre']) || empty($_POST['contenu'])) {
    ?>
        <label>Tout les champs sont obligatoires</label>
        <br/>
        <form name="envoyer" action="" method="post">
            <label>Titre: </label>
            <br/>
            <input name="titre" type="text"></input>
            <br/>
            <label>Contenu: </label>
            <br/>
            <textarea name="contenu" type="text" rows="4" cols="50"></textarea> 
            <br/>
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <a href="listeArticles.php" class="button">annuler</a>'
<?php

} else {
    try {
        $conn = mysqli_connect("localhost", "root", "root", "Articles");
        if (!$conn) {
            echo "Connexion à la base impossible";
        }
        $today = date("Ymd");
        $titre = str_replace('\'', '"', $_POST['titre']);
        $contenu = str_replace('\'', '"', $_POST['contenu']);
        $id_auteur = $_SESSION['id'];
        $sql = "INSERT INTO ARTICLE (titre, contenu, dateArticle, id_auteur)
        VALUES ( '$titre','$contenu','$today','$id_auteur')";
        echo $sql;
        if ($conn->query($sql) == true) {
            echo 'Enregistrement réussi';
            echo "<br/>";
            echo '<a href="listeArticles.php" class="button">Continuer</a>';
        } else {
            echo 'Echec';
            echo "<br/>";
            echo '<a href="ajouterArticle.php" class="button">réessayer</a>';
        }
        $conn->close();
    } catch (Exception $ex) {
        echo $ex;
    }
}
?>
</body>
</html>