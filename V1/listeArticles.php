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
    <title>Liste Articles</title>
</head>

<body>
    <h2>Bienvenue</h2>
    <a href="Deconnexion.php" class="button">Deconnexion</a>
    <p>
        <?php 
        echo "<h2>" . $_SESSION['login'] . "</h2>";
        echo "<br/>";
        echo '<a href="ajouterArticle.php" class="button">Ajouter un article</a>';
        echo "<br/>";
        echo "<br/>";
        echo "Listes des articles :";
        echo "<br/>";
        $conn = mysqli_connect("localhost", "root", "root", "Articles");
        if (!$conn) {
            echo "Connexion à la base impossible";
        }
        $sql = "SELECT * FROM ARTICLE,AUTEUR WHERE ARTICLE.id_auteur=AUTEUR.id_auteur ORDER BY dateArticle DESC";
        $result = mysqli_query($conn, $sql);

        while ($row = $result->fetch_assoc()) {
            echo "Titre: " . $row["titre"] . "<br/>";
            echo "Date: " . $row["dateArticle"] . "<br/>";
            echo "Auteur :" . $row["nom"] . " " . $row["prenom"] . "<br/>";
            echo $row["contenu"] . "<br/>";
            echo "<br/>";
        }
        $conn->close();
        ?>
    </p>
</body>

</html>