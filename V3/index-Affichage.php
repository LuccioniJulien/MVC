<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        if ($mdp == $password) {
            echo "Bienvenue " . $prenom . " " . $nom;
            echo "<br/>";
            echo '<a href="liste-Traitement.php" class="button">Continuer</a>';
        } else {
            echo 'Erreur de login ou de mdp';
            echo "<br/>";
            echo '<a href="index.php" class="button">réessayer</a>';
        }
    } else {
        ?>
        <form name="envoyer" action="" method="post">
            <label>Login</label>
            <input name="login" type="text"></input>
            <label>Mdp</label>
            <input name="mdp" type="password"></input>
            <input type="submit" value="Connexion" name="submit">
        </form>
        <?php

    }
    ?>
</body>

</html>

