<div id="homewrapper">

<?php
session_start();
include_once ('db/userdata.php');

// Action

$stmt = $db->prepare ("INSERT INTO kunden (kunden_id, vorname, nachname, email, telefonnummer, strasse, hausnummer,
stadt, land, plz) VALUES ('', :vorname, :nachname, :email, :telefonnummer, :strasse, :hausnummer, 
:stadt, :land, :plz)");

$Produkt_ID = //Action

<td><a href="?page=product&product=show&id=<?php echo $result['id']?>">

$stmt->bindParam(":vorname", $_POST["vorname"]);
$stmt->bindParam(":nachname", $_POST["nachname"]);
$stmt->bindParam(":email", $_POST["email"]);
$stmt->bindParam(":telefonnummer", $_POST["telefonnummer"]);
$stmt->bindParam(":strasse", $_POST["strasse"]);
$stmt->bindParam(":hausnummer", $_POST["hausnummer"]);
$stmt->bindParam(":stadt", $_POST["stadt"]);
$stmt->bindParam(":land", $_POST["land"]);
$stmt->bindParam(":plz", $_POST["plz"]);
$stmt->bindParam(":produktid", $Produkt_ID);
$stmt->execute();





