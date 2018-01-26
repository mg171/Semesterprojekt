<?php
session_start();

//Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}
include_once ('../db/userdata.php');
$id = $_POST ["id"];
$artikelname = $_POST["artikelname"];
$marke_id = $_POST["marke_id"];
$beschreibung = $_POST["beschreibung"];
$preis = $_POST["preis"];
$bild = $_POST["bild"];
$menge = $_POST["menge"];
$mindestbestand = $_POST["mindestbestand"];
$eancode = $_POST["eancode"];

if (!empty($artikelname) && !empty($marke_id) && !empty($preis) && !empty($beschreibung)) {

    $stmt = $db->query("UPDATE produkt SET name= ' $artikelname ', marke_id= $marke_id, beschreibung= ' $beschreibung ',
preis=  '$preis' , menge= ' $menge ', mindestbestand= '$mindestbestand', eancode= '$eancode' WHERE id =   $id ");

    $stmt->bindParam(":artikelname", $artikelname);
    $stmt->bindParam(":marke_id", $marke_id);
    $stmt->bindParam(":beschreibung", $beschreibung);
    $stmt->bindParam(":preis", $preis);
    $stmt->bindParam(":bild", $_FILES['bild']['name']);
    $stmt->bindParam(":menge", $menge);
    $stmt->bindParam(":mindestbestand", $mindestbestand);
    $stmt->bindParam(":eancode", $eancode);
    $stmt->execute();
    header("Location: artikel.php");
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}