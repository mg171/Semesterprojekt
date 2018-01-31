<div id="homewrapper">

<?php
session_start();
include_once ('../db/userdata.php');

try
{
    $db = new PDO($dsn, $dbuser, $dbpass);
}

catch (PDOException $p)

{

    echo ("Fehler bei Aufbau der Datenbankverbindung.");
    die();
}


$sql = "SELECT MAX(bestellnummer) + 1 FROM bestellungen";
$stmt = $db->prepare($sql);
$stmt->execute();
$newbestnr = $stmt->fetchColumn();


// Bestellungen in Datenbank

foreach ($_SESSION['warenkorb'] as $key => $cart) {


$produktid = $cart['id'];
$anzahl = $cart['anzahl'];
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];
$strasse = $_POST["strasse"];
$hausnummer = $_POST["hausnummer"];
$stadt = $_POST["stadt"];
$plz = $_POST["plz"];
$zahlmethode = $_POST['zahlmethode'];


$sql = "INSERT INTO bestellungen (best_id, bestellnummer, vorname, nachname, email, strasse, hausnummer,
stadt, plz, zahlmethode, prod_id, prod_anzahl)
  VALUES ('', '$newbestnr', '$vorname', '$nachname', '$email', '$strasse', '$hausnummer', 
'$stadt', '$plz', '$zahlmethode', '$produktid', '$anzahl')";
$db->exec($sql);

}

include "../mail/index.php";
unset($_SESSION['warenkorb']);
header('Location: ../index.php?page=kasse&action=bestaetigung');

?>
</div>
