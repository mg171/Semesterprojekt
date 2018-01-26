<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
       
        case "artikel":
            include "produkt.php";
            break;
        case "artikelaendern":
            include "produktaendern.php";
            break;
        case "artikelneu":
            include "produktneu.php";
            break;
        default:
            echo "Seite nicht gefunden";
            die();
            break;
    }
}
else
{
    echo "Seite nicht gefunden";
}
