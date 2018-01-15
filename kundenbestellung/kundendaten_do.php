<!DOCTYPE html>
<html>
<head>
    <title>Bestellung</title>
</head>
<body>
<h1>Vielen Dank für Ihre Bestellung bei Handy.Shop!</h1>

<?php

require_once dirname(__FILE__).'/../db/userdata.php';

try
{
    $db = new PDO($dsn, $dbuser, $dbpass);
}

catch (PDOException $p)

{

    echo ("Fehler bei Aufbau der Datenbankverbindung.");
    die();
}


$stmt = $db->prepare ("INSERT INTO kunden (kunden_id, vorname, nachname, email, telefonnummer, strasse, hausnummer,
stadt, land, plz) VALUES ('', :vorname, :nachname, :email, :telefonnummer, :strasse, :hausnummer, 
:stadt, :land, :plz)");
$stmt->bindParam(":vorname", $_POST["vorname"]);
$stmt->bindParam(":nachname", $_POST["nachname"]);
$stmt->bindParam(":email", $_POST["email"]);
$stmt->bindParam(":telefonnummer", $_POST["telefonnummer"]);
$stmt->bindParam(":strasse", $_POST["strasse"]);
$stmt->bindParam(":hausnummer", $_POST["hausnummer"]);
$stmt->bindParam(":stadt", $_POST["stadt"]);
$stmt->bindParam(":land", $_POST["land"]);
$stmt->bindParam(":plz", $_POST["plz"]);
$stmt->execute();


$empf = "lenapopp8@gmail.com";
$betreff ="Bestellbestätigung";
$from .= "From: Handy Webshop <handy.webshop@gmail.com>\n";
$from .= "Reply-To: handy.webshop@gmail.com\n";
$from .= "Content-Type: text/html\n";
$text .= "<h1>Bestellbestätigung</h1> <p>Vielen Dank für Ihre Bestellung!</p>";


mail($empf, $betreff, $text, $from);

?>