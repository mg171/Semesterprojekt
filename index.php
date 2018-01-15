<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Onlineshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/2ab6c8da3b.js"></script>
</head>

<body>


<br>
<div class="navbar">

    <?php

        echo '<img src="images/logo/logo_navbar.jpg" alt="Logo">';
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
                <a href='index.php?page=category&action=samsung'> Samsung</a>
            </div>
        </div>";

        echo '<a href="index.php?page=login&action=login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>';
        echo '<a href="index.php?page=warenkorb"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Warenkorb</a>';
        echo '</div>';


    ?>


</div>


<?php

if (isset($_GET["page"]) ) {
    switch ($_GET["page"]) {
        case "category":
            include "category/index.php";
            break;
        case "login":
            include "login/login1.php";
            break;
        case "product":
            include "productpage/index.php";
            break;
        case  "warenkorb":
            include "warenkorb/index.php";
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



</html>
