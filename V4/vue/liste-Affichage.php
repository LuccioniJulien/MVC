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
    <a href="index.php?action=deco" class="button">Deconnexion</a>
    <p>
    <?php 
    echo "<h2>" . $_SESSION['login'] . "</h2>";
    echo "<br/>";
    echo '<a href="index.php?action=ajouter" class="button">Ajouter un article</a>';
    echo "<br/>";
    echo "<br/>";
    echo "Listes des articles :";
    echo "<br/>";
    while ($row = $result->fetch_assoc()) {
        echo "Titre: " . $row["titre"] . "<br/>";
        echo "Date: " . $row["dateArticle"] . "<br/>";
        echo "Auteur :" . $row["nom"] . " " . $row["prenom"] . "<br/>";
        echo $row["contenu"] . "<br/>";
        echo "<br/>";
    }
    ?>
    </p>
</body>
</html>