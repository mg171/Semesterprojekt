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

//echo ($_POST["artikelname"]);

$stmt = $db->prepare ("INSERT INTO kunden (kunden_id, vorname, nachname, email, telefonnummer, strasse, hausnummer,
stadt, land, plz) VALUES ('', :vorname, :nachname, :email, :telfonnummer, :strasse, :hausnummer, 
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

/*if(!$stmt->execute()){
    echo("fehler");
    print_r($db->errorInfo());
}
*/
?>