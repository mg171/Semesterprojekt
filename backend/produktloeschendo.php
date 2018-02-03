<?php
session_start();

// Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

$id=$_GET["id"];

include_once ('../db/userdata.php');

// SQL-Delete Statement

$db = new PDO($dsn, $dbuser, $dbpass);

$stmt = $db->query("DELETE FROM produkt WHERE id=" . $id);
$stmt->execute();

header('Location: produkt.php');
?>