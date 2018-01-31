<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Webshop Handy</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/2ab6c8da3b.js"></script>
    <style>
        body { margin: 40px; }
    </style>
</head>

<?php
session_start();

// Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}



try {
    include_once "../db/userdata.php";
    $id = (int)$_GET["id"];
    $db = new PDO($dsn, $dbuser, $dbpass);
    $sql = "SELECT * FROM produkt WHERE id=$id";
    $query = $db->prepare($sql);
    $query->execute();
    if ($zeile = $query->fetchObject()) {

        echo "<h2>Produkt mit der ID $zeile->id</h2>";
        echo "<form action='produktaenderndo.php' method='post'>";
        echo "<input type='hidden' name='id' value='$zeile->id' /> <br>";
        echo "Produktname: <br> <input type='text' name='artikelname' value='$zeile->artikelname' /><br><br>";
        echo "Marken_ID: <br><input type='text' name='marke_id' value='$zeile->marke_id'/><br><br>";
        echo "Beschreibung: <br>";
        echo "<textarea name='beschreibung'>$zeile->beschreibung</textarea><br><br>";
        echo "Preis: <br><input type='text' name='preis' value='$zeile->preis'/><br><br>";
        echo "Menge: <br><input type='text' name='menge' value='$zeile->menge'/><br><br>";
        echo "Mindestbestand: <br><input type='text' name='mindestbestand' value='$zeile->mindestbestand'/><br><br>";
        echo "EANCode: <br><input type='text' name='eancode' value='$zeile->eancode'/><br><br>";
        echo "<input type='submit' value='Produkt aktualisieren' />";
        echo "</form>"; }

    else {
        echo "Datensatz nicht gefunden!";
    }

    $db = null;
}

catch (PDOException $e) {
    echo "Fehler: Bitten wenden Sie sich an den Administrator.";
    die();
}

echo '<br><a href="./produkt.php"> Zurück zur Produktübersicht</a>';

?>

</html>