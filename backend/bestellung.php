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

include ('../db/userdata.php');

echo '<a href="./bestellungen.php">Zurück zur Bestellübersicht</a><br><br><br>';

$bestellnr = $_GET['bestellnummer'];

echo '<h1>Übersicht der Bestellung mit der Bestellnummer '. $bestellnr . '</h1><br>';


$db = new PDO($dsn, $dbuser, $dbpass);
$stmt = $db->query("SELECT * FROM bestellungen WHERE bestellnummer=$bestellnr");
$stmt->execute();
$result = $stmt->fetchAll();

echo "<table border='1px solid black'>";
echo "<tr>
                    <th>Bestellnr</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>E-Mail-Adresse</th>
                    <th>Straße</th>
                    <th>Hausnr</th>
                    <th>PLZ</th>
                    <th>Stadt</th>
                    <th>Zahlmethode</th>
                    <th>Prod_ID</th>
                    <th>Anzahl</th>
                </tr>";


foreach ($result as $row) {

    $bestellnummer = $row['bestellnummer'];
    $vorname = $row['vorname'];
    $nachname = $row['nachname'];
    $email = $row['email'];
    $strasse = $row['strasse'];
    $hausnummer = $row['hausnummer'];
    $plz = $row['plz'];
    $stadt = $row['stadt'];
    $zahlmethode = $row['zahlmethode'];
    $prod_id = $row['prod_id'];
    $prod_anzahl = $row['prod_anzahl'];


    echo "<tr>";
    echo "<td width='30'>". $bestellnummer . "</td>";
    echo "<td width='30'>". $vorname . "</td>";
    echo "<td width='30'>". $nachname . "</td>";
    echo "<td width='60'>". $email . "</td>";
    echo "<td width='70'>". $strasse . "</td>";
    echo "<td width='30'>". $hausnummer . "</td>";
    echo "<td width='30'>". $plz . "</td>";
    echo "<td width='50'>". $stadt . "</td>";
    echo "<td width='60'>". $zahlmethode . "</td>";
    echo "<td width='30'>". $prod_id . "</td>";
    echo "<td width='30'>". $prod_anzahl . "</td>";
    echo "</tr>";
    echo "<br>";

}
echo "</table>";
?>