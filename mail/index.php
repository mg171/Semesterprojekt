<!DOCTYPE html>
<html>
<head>
<title>Bestellung</title>
</head>
<body>
<?php

// Funktion zum Senden der Bestätigungsmail

    $empf = $_POST["email"];
    $betreff ="Bestellbestätigung";
    $from .= "From: Handy Webshop <handy.webshop@gmail.com>\n";
    $from .= "Reply-To: handy.webshop@gmail.com\n";
    $from .= "Content-Type: text/html\n";
    $text .= "<h1>Bestellbest&auml;tigung</h1> 
              <p>Vielen Dank für Ihre Bestellung! <br>
              Alle Preise verstehen sich inkl. 19% Mwst. <br>
              Lieferung erfolgt binnen 3 Werktagen nach Zahlungseingang. <br>
              Wir erwarten Ihre Zahlung binnen von 10 Tagen per &Uuml;berweisung oder Kreditkarte auf unser Konto. <br>
              &Uuml;berweisungen richten Sie bitte mit ihrer Bestellungnummer ".$newbestnr ." als Verwendungszweck an <br>
              <br>
              Bank: HdM-Bank <br>
              IBAN: DE12345678765432 <br>
              Inhaber: Webshop Handy <br>
              Betrag: ".$preisgesamt. "<br>

              Mit freundlichen Gr&uuml;ßen, <br>
              Webshop Handy | Marcel, Monique und Lena
              </p>";


    mail($empf, $betreff, $text, $from);

?>

</body>
</html>