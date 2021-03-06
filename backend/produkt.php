<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Webshop Handy</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/2ab6c8da3b.js"></script>
    <style>
        body { margin: 30px; }
    </style>
</head>

<?php
session_start();

// Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

include ('../db/userdata.php');

echo '<a class="backlinks" href="index.php?page=backend&action=produktneu">Neues Produkt einstellen</a><br><br>';

echo '<a class="backlinks" href="index.php?page=backend&action=bestellungen">Bestellungen ansehen</a><br><br>';

echo '<a class="backlinks" href="../index.php?page=logout&action=logout">Logout</a>';

echo '<h1>Produktübersicht</h1>';

// Alle Daten aus der SQL-Tabelle Produkte ziehen um sie in einer Tabelle im Backend auszugeben

$db = new PDO($dsn, $dbuser, $dbpass);
$stmt = $db->query("SELECT * FROM produkt");
$stmt->execute();
$result = $stmt->fetchAll();


foreach ($result as $row) {


    echo "<table border='1px solid black'>";
    echo "<tr>
                    <th>ID</th>
                    <th>Produktname</th>
                    <th>Marke</th>
                    <th>Beschreibung</th>
                    <th>Preis</th>
                    <th>Menge</th>
                    <th>Mindestbestand</th>
                    <th>EAN</th>
                    <th><i class='fa fa-pencil-square-o' aria-hidden='true'></i></th>
                    <th><i class='fa fa-trash' aria-hidden='true'></i></th>
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
    echo "<td width='50'>". $id . "</td>";
    echo "<td width='100'>". $artikelname . "</td>";
    echo "<td width='50'>". $marke_id . "</td>";
    echo "<td width='300'>". $beschreibung . "</td>";
    echo "<td width='50'>". $preis . "€</td>";
    echo "<td width='50'>". $menge . "</td>";
    echo "<td width='50'>". $mindestbestand . "</td>";
    echo "<td width='50'>". $eancode . "</td>";
    echo '<td><a class="backlinks" href="index.php?page=backend&action=produktaendern&id='. $id .'">';
    echo 'edit';
    echo '</a></td>';
    echo '<td><a class="backlinks" href="index.php?page=backend&action=produktloeschen&id='. $id .'">';
    echo 'delete';
    echo '</a></td>';
    echo "</tr>";
    echo "<br>";

}
    echo "</table>";
?>


</html>