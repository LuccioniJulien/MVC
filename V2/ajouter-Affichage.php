<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter</title>
</head>
<body>
    <label>Tout les champs sont obligatoires</label>
        <br/>
        <?php
        if (isset($_POST['submit']) && !empty($_POST['titre']) && !empty($_POST['contenu'])) {
            if ($bool) {
                echo 'Enregistrement réussi';
                echo "<br/>";
                echo '<a href="liste-Traitement.php" class="button">Continuer</a>';
            } else {
                echo 'Echec';
                echo "<br/>";
                echo '<a href="ajouter-Traitement.php" class="button">réessayer</a>';
            }
        } else {
            ?>
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
            <a href="liste-Traitement.php" class="button">annuler</a>'
        </form>
        <?php

    }
    ?>
        
</body>
</html>