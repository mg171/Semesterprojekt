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



foreach ($_SESSION['warenkorb'] as $key => $cart) {

    $produktid = $cart['id'];
    $anzahl = $cart['anzahl'];


$stmt = $db->prepare ("INSERT INTO bestellungen (bestellnummer, vorname, nachname, email, strasse, hausnummer,
stadt, plz, zahlmethode, prod_id, prod_anzahl)
  VALUES ('', :vorname, :nachname, :email, :strasse, :hausnummer, 
:stadt, :plz, :zahlmethode, :prod_id, :prod_anzahl)");

$stmt->bindParam(":vorname", $_POST["vorname"]);
$stmt->bindParam(":nachname", $_POST["nachname"]);
$stmt->bindParam(":email", $_POST["email"]);
$stmt->bindParam(":strasse", $_POST["strasse"]);
$stmt->bindParam(":hausnummer", $_POST["hausnummer"]);
$stmt->bindParam(":stadt", $_POST["stadt"]);
$stmt->bindParam(":plz", $_POST["plz"]);
$stmt->bindParam(":zahlmethode",$_POST['zahlmethode']);
$stmt->bindParam(":prod_id",$produktid);
$stmt->bindParam(":prod_anzahl",$anzahl);
$stmt->execute();


}

        
        unset($_SESSION['warenkorb']);
        header('Location: ../index.php?page=kasse&action=bestaetigung');

?>
</div>
