<?php

// Switch Case für das Routing

if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "zurkasse":
            include "zurkasse.php";
            break;
        case "bestaetigung":
            include "bestaetigung.php";
            break;
        default:
            echo "Seite nicht gefunden";
            die();
            break;
    }
}
else
{
    echo "Seite nicht gefunden";}