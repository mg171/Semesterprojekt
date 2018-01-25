<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
       
        case "artikel":
            include "artikel.php";
            break;
        case "artikelaendern":
            include "artikelaendern.php";
            break;
        case "artikelneu":
            include "artikelneu.php";
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
