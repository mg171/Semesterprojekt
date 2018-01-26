<?php
session_start();

//Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

$ud=$_GET ["id"];

include_once ("../db/userdata.php");

$stmt = $db->query("SELECT * FROM produkt WHERE id=".$id);
$stmt->execute();
$results = $stmt->fetchAll();
foreach ($results as $row) {
    echo '
    <form action="backend/produktaenderndo.php" method="post">
        <input type="hidden" name="id" value="' . $id . '">
        <br>
        <input type="text" name="name" value="' . $row["artikelname"] . '">
        <br>
        <input type="text" name="marke_id" value="' . $row["marke_id"] . '">
        <br>
        <input type="text" name="beschreibung" value="' . $row["beschreibung"] . '">
        <br>
        <input type="text" name="preis" value="' . $row["preis"] . '">
        <br>
        <input type="text" name="beschreibung" value="' . $row["beschreibung"] . '">
        <br>
        <input type="file" name="bild" value="' . $row["bild"] . '">
        <br>
        <input type="text" name="menge" value="' . $row["menge"] . '">
        <br>
        <input type="text" name="mindestbestand" value="' . $row["mindestbestand"] . '">
        <br>
        <input type="text" name="eancode" value="' . $row["eancode"] . '">
        <br>
        <br>
        <input type="submit">
    </form>
';
}
?>