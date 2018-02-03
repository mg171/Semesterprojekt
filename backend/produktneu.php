<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Webshop Handy</title>
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

include ("../db/userdata.php");

echo '<h2>Neues Produkt einstellen</h2><br>';

// Formular zum Eintragen eines neuen Produktes

echo'
    <form action="produktneudo.php" method="post" enctype="multipart/form-data">
    Artikelname:<br><input type="text" name="artikelname"><br><br>
    Marken_ID: (1-Apple, 2-Samsung, 3-Google, 4-Huawei, 5-Motorola, 6-LG)<br><input type="text" name="marke_id"><br><br>
    Beschreibung:<br><input type="text" name="beschreibung"><br><br>
    Preis:<br><input type="text" name="preis"><br><br>
    Produktbild:<br><input type="file" name="bild"><br><br>
    Menge:<br><input type="text" name="menge"><br><br>
    Mindestbestand:<br><input type="text" name="mindestbestand"><br><br>
    EAN-Code:<br><input type="text" name="eancode"><br><br>
    <input type ="submit" value="Artikel hinzufügen">
</form>';

echo '<br><a href="./produkt.php"> Zurück zur Produktübersicht</a>';

?>

</html>
