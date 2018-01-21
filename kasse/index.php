<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "zurkasse":
            include "./kasse/zurkasse.php";
            break;
        case "erfolg":
            include "./kasse/erfolg.php";
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