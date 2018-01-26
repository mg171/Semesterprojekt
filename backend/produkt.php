<?php
session_start();

//Berechtigung prüfen
if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}

include ('db/userdata.php');

echo '<a href="?page=backend&action=produktneu">Neues Produkt einstellen</a><br><br>';
$stmt = $db->query("SELECT * FROM produkt");
$stmt->execute();
$result = $stmt->fetchAll();
echo '<ul class="flex-container">';
foreach ($result as $row) {
    $artikelname = $row['name'];
    $artikelnummer = $row ['artikelnummer'];
    $preis = $row ['preis'];
    echo '<li class="flex-item">
        <div class="mini-beschreibung">
            <a href="?page=backend&action=artikelchange&artikelnummer='.        $artikelnummer .'">';
    echo $artikelname."<br>".$preis." €";
    echo '</a>
           </div>
        </li>
         ';
}
?>