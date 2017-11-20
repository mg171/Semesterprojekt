<?php

include_once ("db/userdata.php");

try

{
    $db = new PDO($dsn, $dbuser, $dbpass);
}

catch (PDOException $p)

{

    echo ("Fehler bei Aufbau der Datenbankverbindung.");
}

echo ($_POST["produkt"]);

$stmt = $db->prepare("INSERT INTO produkt (produkt_id, artikelname, marke_id, beschreibung, preis, bild, 
menge, mindestbestand, eancode) VALUES('', :artikelname, :marke_id, :beschreibung, :preis, :bild, :menge, 
:mindestbestand, :eancode)");
$stmt->bindParam('artikelname', $_POST["artikelname"]);
$stmt->bindParam('marke_id', $_POST["marke_id"]);
$stmt->bindParam('beschreibung', $_POST["beschreibung"]);
$stmt->bindParam('preis', $_POST["preis"]);
$stmt->bindParam('bild', $_FILES["bild"]);
$stmt->bindParam('menge', $_POST["menge"]);
$stmt->bindParam('mindestbestand', $_POST["mindestbestand"]);
$stmt->bindParam('eancode', $_POST["eancode"]);
$stmt->execute();


?>