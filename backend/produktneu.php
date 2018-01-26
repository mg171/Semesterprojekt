<?php
session_start();

//Berechtigung prüfen

/* if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
} */

include ("../db/userdata.php");

echo'
    <form action="produktneudo.php" method="post" enctype="multipart/form-data">
    Artikelname:<input type="text" name="artikelname"><br>
    Marke:<input type="text" name="marke_id"><br>
    Beschreibung:<input type="text" name="beschreibung"><br>
    Preis:<input type="text" name="preis"><br>
    Bild:<input type="file" name="bild"><br>
    Menge:<input type="text" name="menge"><br>
    Mindestbestand:<input type="text" name="mindestbestand"><br>
    EAN-Code:<input type="text" name="eancode"><br>
    <input type ="submit" value="Artikel hinzufügen">
</form>';