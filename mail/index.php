<!DOCTYPE html>
<html>
    <head>
<title>Bestellung</title>
    </head>
    <body>

    <?php

    $empf = "testg3.mg@gmail.com";
    $betreff ="Bestellbestätigung";
    $from .= "From: Handy Webshop <handy.webshop@gmail.com>\n";
    $from .= "Reply-To: handy.webshop@gmail.com\n";
    $from .= "Content-Type: text/html\n";
    $text .= "<h1>Bestellbestätigung</h1> <p>Vielen Dank für Ihre Bestellung!</p>";


    mail($empf, $betreff, $text, $from);

    ?>
    </body>
</html>