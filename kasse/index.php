<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "zurkasse":
            include "zurkasse.php";
            break;
        case "erfolg":
            include "erfolg.php";
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