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

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

include ('../db/userdata.php');

echo '<a href="index.php?page=backend&action=produktneu">Neues Produkt einstellen</a><br><br>';


echo '<h1>Produktübersicht</h1>';

$db = new PDO($dsn, $dbuser, $dbpass);
$stmt = $db->query("SELECT * FROM produkt");
$stmt->execute();
$result = $stmt->fetchAll();


foreach ($result as $row) {

    echo "<table border='1px solid black'>";
    echo "<tr>
                    <th>ID</th>
                    <th>Produktname</th>
                    <th>Marke_ID</th>
                    <th>Beschreibung</th>
                    <th>Preis</th>
                    <th>Menge</th>
                    <th>Mindestbestand</th>
                    <th>Eancode</th>
                    <th><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></th>
                </tr>";

    $id = $row['id'];
    $artikelname = $row['artikelname'];
    $marke_id = $row['marke_id'];
    $beschreibung = $row['beschreibung'];
    $preis = $row['preis'];
    $bild = $row['bild'];
    $menge = $row['menge'];
    $mindestbestand = $row['mindestbestand'];
    $eancode = $row['eancode'];


    echo "<tr>";
    echo "<td width='30'>". $row['id'] . "</td>";
    echo "<td width='80'>". $row['artikelname'] . "</td>";
    echo "<td width='30'>". $row['marke_id'] . "</td>";
    echo "<td width='500'>". $row['beschreibung'] . "</td>";
    echo "<td width='50'>". $row['preis'] . "€</td>";
    echo "<td width='80'>". $row['menge'] . "</td>";
    echo "<td width='140'>". $row['mindestbestand'] . "</td>";
    echo "<td width='100'>". $row['eancode'] . "</td>";
    echo "<td>";
    echo '<a href="index.php?page=backend&action=produktaendern&id='. $id .'">';
        echo 'bearbeiten';
        echo '</a>';
    echo "</tr>";
    echo "<br>";

echo "</table>";
}
?>