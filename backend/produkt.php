<?php
session_start();

//Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

include ('../db/userdata.php');

echo '<a href="index.php?page=backend&action=produktneu">Neues Produkt einstellen</a><br><br>';




$db = new PDO($dsn, $dbuser, $dbpass);
$stmt = $db->query("SELECT * FROM produkt");
$stmt->execute();
$result = $stmt->fetchAll();


foreach ($result as $row) {

    echo "<table>";
    echo "<tr>
                    <th>ID</th>
                    <th>Produktname</th>
                    <th>Marke_ID</th>
                    <th>Beschreibung</th>
                    <th>Preis</th>
                    <th>Menge</th>
                    <th>Mindestbestand</th>
                    <th>Eancode</th>
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
    echo "<td>". $row['id'] . "</td>";
    echo "<td>". $row['artikelname'] . "</td>";
    echo "<td>". $row['marke_id'] . "</td>";
    echo "<td>". $row['beschreibung'] . "</td>";
    echo "<td>". $row['preis'] . "</td>";
    echo "<td>". $row['menge'] . "</td>";
    echo "<td>". $row['mindestbestand'] . "</td>";
    echo "<td>". $row['eancode'] . "</td>";
    echo "<td>";
    echo '<a href="index.php?page=backend&action=produktaendern&id='. $id .'">';
        echo 'bearbeiten';
        echo '</a>';
    echo "</tr>";

echo "</table>";
}
?>