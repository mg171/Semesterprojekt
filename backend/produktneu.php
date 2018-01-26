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

//Berechtigung prüfen

/* if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
} */

include ("../db/userdata.php");

echo'
    <form action="produktneudo.php" method="post" enctype="multipart/form-data">
    Artikelname:<input type="text" name="artikelname"><br>
    Marke:<input type="text" name="marke_id"><br>
    Beschreibung:<input type="text" name="beschreibung"><br>
    Preis:<input type="text" name="preis"><br>
    Bild:<input type="file" name="bild"><br>
    Menge:<input type="text" name="menge"><br>
    Mindestbestand:<input type="text" name="mindestbestand"><br>
    EAN-Code:<input type="text" name="eancode"><br>
    <input type ="submit" value="Artikel hinzufügen">
</form>';