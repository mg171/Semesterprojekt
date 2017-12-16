<?php

if (isset($_GET["warenkorb"]))
{
    switch ($_GET["warenkorb"]) {
        case "show":
            include "warenkorb/show.php";
            break;
        case "update":
            include "warenkorb/update.php";
            break;
        case "loeschen":
            include "warenkorb/loeschen.php";
            break;
        default:
            echo "Diese Seite wurde nicht gefunden.";
            die();
            break;
    }
} else {
    echo "Diese Seite wurde nicht gefunden.";
}
