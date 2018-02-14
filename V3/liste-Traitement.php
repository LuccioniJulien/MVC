<?php
require('listeBdd.php');
$result = getList();
if (empty($_SESSION['id'])) {
    header("Location: index.php");
    die();
}
include('liste-Affichage.php');
?>