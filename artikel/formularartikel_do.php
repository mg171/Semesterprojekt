<?php

$dsn="mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-lp055"; //wo der Server bzw. die Datenbank zu finden ist

try

{
    $db = new PDO($dsn, 'lp055', 'eeshoh2ieV', array('charset'=>'utf8'));
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