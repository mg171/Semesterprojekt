<?php
session_start();

//Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php"); }

$id = $_POST ["id"];
$artikelname = $_POST["artikelname"];
$marke_id = $_POST["marke_id"];
$beschreibung = $_POST["beschreibung"];
$preis = $_POST["preis"];
$bild = $_FILES['bild']['name'];
$menge = $_POST["menge"];
$mindestbestand = $_POST["mindestbestand"];
$eancode = $_POST["eancode"];

if (!empty($artikelname) && !empty($preis)) {

    try {
        include_once("../db/userdata.php");
        $db = new PDO($dsn, $dbuser, $dbpass);
        $query = $db->prepare(
            "UPDATE produkt SET artikelname= :artikelname, marke_id= :marke_id, beschreibung= :beschreibung,
    preis= :preis, menge= :menge, mindestbestand= :mindestbestand, eancode= :eancode WHERE id= :id");
        $query->execute(array("artikelname" => $artikelname, "marke_id" => $marke_id, "beschreibung" => $beschreibung,
            "preis" => $preis, "menge" => $menge, "mindestbestand" => $mindestbestand, "eancode" => $eancode, "id" => $id));
        $db = null;
        header('Location: produkt.php');

    } catch (PDOException $e) {
        echo "Es ist ein Fehler aufgetreten!";
        die();
    }
}

 else {
    echo "Fehler: Bitte alle Felder ausfüllen!";
}