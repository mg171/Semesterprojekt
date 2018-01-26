<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
       
        case "produkt":
            include "produkt.php";
            break;
        case "produktaendern":
            include "produktaendern.php";
            break;
        case "produktneu":
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
