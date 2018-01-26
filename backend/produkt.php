<?php
session_start();

//Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

include ('../db/userdata.php');

echo '<a href="?page=backend&action=produktneu">Neues Produkt einstellen</a><br><br>';

$stmt = $db->query("SELECT * FROM produkt");
$stmt->execute();
$result = $stmt->fetchAll();


foreach ($result as $row) {
    $artikelname = $row['name'];
    $id = $row ['id'];
    $preis = $row ['preis'];
    echo '
            <a href="?page=backend&action=produktchange&id='.        $id .'">';
    echo $id."<br>".$preis." €";
    echo '</a>

         ';
}
?>