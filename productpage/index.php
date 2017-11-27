<?php
if (isset($_GET["product"]))
{
    switch ($_GET["product"]) {
        case "show":
            include "show.php";
            break;
        default:
            echo "Die Seite wurde nicht gefunden";
            die();
            break;
    }
} else {
    echo "Diese Seite existiert nicht.";
}

