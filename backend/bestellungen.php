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

echo '<a href="./produkt.php">Zur Produktübersicht</a><br><br>';


echo '<h1>Bestellübersicht</h1>';

$db = new PDO($dsn, $dbuser, $dbpass);
$stmt = $db->query("SELECT * FROM bestellungen GROUP BY bestellnummer");
$stmt->execute();
$result = $stmt->fetchAll();

echo "<table border='1px solid black'>";
echo "<tr>
                    <th>Bestellnummer</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>E-Mail-Adresse</th>
                    <th><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></th>
                </tr>";


foreach ($result as $row) {


    $bestellnummer = $row['bestellnummer'];
    $vorname = $row['vorname'];
    $nachname = $row['nachname'];
    $email = $row['email'];


    echo "<tr>";
    echo "<td width='30'>". $row['bestellnummer'] . "</td>";
    echo "<td width='30'>". $row['vorname'] . "</td>";
    echo "<td width='30'>". $row['nachname'] . "</td>";
    echo "<td width='100'>". $row['email'] . "</td>";
    echo '<td><a href="index.php?page=backend&action=bestellung&bestellnummer='. $bestellnummer .'">';
    echo 'ansehen';
    echo '</a></td>';
    echo "</tr>";
    echo "<br>";

}
    echo "</table>";
?>
