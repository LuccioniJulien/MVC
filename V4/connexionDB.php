<?php
session_start();
function bdd()
{
    try {
        $db = mysqli_connect("localhost", "root", "root", "Articles");
        if (!$db) {
            throw new Exception('bdd indisponible');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $db;
}
?>