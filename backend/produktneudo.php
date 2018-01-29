<?php
session_start();

//Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

include ("../db/userdata.php");

try
{
    $db = new PDO($dsn, $dbuser, $dbpass);
}

catch (PDOException $p)

{

    echo ("Fehler bei Aufbau der Datenbankverbindung.");
    die();
}


$bild = $_FILES['bild']['name'];

move_uploaded_file($_FILES['bild']['tmp_name'],'../images/productshots/' . $_FILES['bild']['name']);

$stmt = $db->prepare ("INSERT INTO produkt (id, artikelname, marke_id, beschreibung, preis, bild, 
menge, mindestbestand, eancode) VALUES ('', :artikelname, :marke_id, :beschreibung, :preis, :bild, :menge, 
:mindestbestand, :eancode)");
$stmt->bindParam(":artikelname", $_POST["artikelname"]);
$stmt->bindParam(":marke_id", $_POST["marke_id"]);
$stmt->bindParam(":beschreibung", $_POST["beschreibung"]);
$stmt->bindParam(":preis", $_POST["preis"]);
$stmt->bindParam(":bild", $_FILES['bild']['name']);
$stmt->bindParam(":menge", $_POST["menge"]);
$stmt->bindParam(":mindestbestand", $_POST["mindestbestand"]);
$stmt->bindParam(":eancode", $_POST["eancode"]);

echo "<br>";
echo "Das neue Produkt wurde erfolgreich hinzugefügt!";
echo "<br><br>";

echo '<a href="index.php?page=backend&action=produkt">Zurück zur Produktübersicht</a><br><br>';


if(!$stmt->execute()){
    echo("fehler");
    print_r($db->errorInfo());
}

?>
