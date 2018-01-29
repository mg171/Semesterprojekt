<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Onlineshop</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/2ab6c8da3b.js"></script>
    <style>
        body { margin: 40px; }
    </style>
</head>

<?php
session_start();

// Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

$id=$_GET ["id"];
include ('../db/userdata.php');
$stmt = $db->query("SELECT * FROM produkt WHERE id=" . $id);
$stmt->execute();
$results=$stmt->fetch();
$name=$results["name"];
echo "Soll das Produkt $artikelname wirklich gelöscht werden?";
echo "<br><br>";
echo '<a href="backend/produktloeschendo.php?id='.$id .'">Ja, Produkt löschen.</a>
        <br>
        <br>
      <a href="./produkt.php">Nein, zurück zur Produktübersicht.</a>';
