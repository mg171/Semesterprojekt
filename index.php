<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Webshop Handy</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/2ab6c8da3b.js"></script>
</head>


<body>


<br>

<!-- Navigationsleiste mit Logo, Startseite, Dropdown-Menü und Warenkorb-Verlinkung -->

<div class="navbar">

    <?php

        echo '<img src="images/logo/smartphone.png" alt="Logo">';
        echo '<div class="navbarmiddle">';
        echo '<a href="index.php">Startseite</a>';
        echo "<div class='dropdown'>
            <button class='dropdown-button'>Markenauswahl <i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></button>
            <div class='dropdown-content'>
                <div id='drop-link-1'><a href='index.php?page=category&category=apple'> Apple</a></div>
                <div id='drop-link-1'><a href='index.php?page=category&category=google'> Google</a></div>
                <div id='drop-link-1'><a href='index.php?page=category&category=huawei'> Huawei</a></div>
                <div id='drop-link-1'><a href='index.php?page=category&category=lg'> LG</a></div>
                <div id='drop-link-1'><a href='index.php?page=category&category=motorola'> Motorola</a></div>
                <a href='index.php?page=category&category=samsung'> Samsung</a>
            </div>
        </div>";

        echo '</div>';
        echo '<div class="navbarright">
                <a href="index.php?page=warenkorb"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Warenkorb</a>
                </div>';


    ?>


</div>


<?php

// Switch Case für das Routing

if (isset($_GET["page"]) ) {
    switch ($_GET["page"]) {
        case "category":
            include "category/index.php";
            break;
        case "login":
            include "login/login.php";
            break;
        case "logout":
            include "logout/logout.php";
            break;
        case "backend":
            include "backend/index.php";
            break;
        case "product":
            include "productpage/index.php";
            break;
        case  "warenkorb":
            include "warenkorb/index.php";
            break;
        case "kasse":
            include "kasse/index.php";
            break;
        case "agb":
            include "agb/agb.html";
            break;
        case "impressum":
            include "impressum/impressum.html";
            break;
        default:
            include "start.php";
            break;
    }
}
else
{
    include "start.php";
}




?>
</body>
<br>
<br>
<br>

<footer>
    <?php

    // Einbinden von Footer aus externer Datei

    include "footer/footer.php";
    ?>
</footer>
</html>
