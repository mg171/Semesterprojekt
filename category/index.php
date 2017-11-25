<?php
if (isset($_GET["category"]))
{
    switch ($_GET["category"]) {
        case "apple":
            include "show.php";
            break;
        case "samsung":
            include "show.php";
            break;
        case "google":
            include "show.php";
            break;
        case "huawei":
            include "show.php";
            break;
        case "motorola":
            include "show.php";
            break;
        case "lg":
            include "show.php";
            break;
        default:
            echo "Die Seite wurde nicht gefunden.";
            die();
            break;
    }
} else {
    echo "Die Seite existiert nicht.";
}
?>
