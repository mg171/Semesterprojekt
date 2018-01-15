<!DOCTYPE html>
<html>
    <head>
<title>Bestellung</title>
    </head>
    <body>
<h1>Vielen Dank für Ihre Bestellung bei Handy.Shop!</h1>
    <?php

    $empf = "lenapopp8@gmail.com";
    $betreff ="Bestellbestätigung";
    $from .= "From: Handy Webshop <handy.webshop@gmail.com>\n";
    $from .= "Reply-To: handy.webshop@gmail.com\n";
    $from .= "Content-Type: text/html\n";
    $text .= "<h1>Bestellbestätigung</h1> <p>Vielen Dank für Ihre Bestellung!</p>";


    mail($empf, $betreff, $text, $from);

    ?>
    </body>
</html>