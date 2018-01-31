<?php

/*
if (!isset($_POST['submit']))
{
    echo "Error, bitte neu abschicken <br>";
}
$empf = "lenapopp8@gmail.com";
$betreff ="Bestellbestätigung";
$from .= "From: Handy Webshop <handy.webshop@gmail.com>\n";
$from .= "Reply-To: handy.webshop@gmail.com\n";
$from .= "Content-Type: text/html\n";
$text .= "<h1>Bestellbestätigung</h1> <p>Vielen Dank für Ihre Bestellung!</p>";


mail($empf, $betreff, $text, $from);

*/

$name = $_POST['besuchername'];
$besucher_mail = $_POST['besuchermail'];
$nachricht = $_POST['nachricht'];


//Validieren
if (empty($name) && empty($besucher_mail))
{
    echo "Bitte Name und Nachricht ausfüllen";
    exit;
}
$email_von = 'lenapopp8@gmail.com';
$email_betreff = "Kontaktformular";
$email_nachricht = "Ein Kontaktformular wurde auf Ihre Seite ausgefüllt von $name.\n".
    "E-Mail Adresse: ".$besucher_mail."\n".
    "Nachricht:\n".$nachricht;

$to = 'lenapopp8@gmail.com';
$headers = "Von: $email_von \r\n";

//Mail schicken
mail($to, $email_betreff, $email_nachricht, $headers, $email_von);

