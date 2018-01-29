<?php
if (!isset($_POST['submit']))
{
    echo "Error, bitte neu abschicken <br>";
}
$name = $_POST['besuchername'];
$besucher_mail = $_POST['besuchermail'];
$nachricht = $_POST['nachricht'];

if (empty($name)|| empty($besucher_mail))
{
    echo "Bitte Name und Nachricht ausfüllen";
}

$email_von = 'lenapopp8@gmail.com';
$email_betreff = "Kontaktformular";
$email_nachricht = "Ein Kontaktformular wurde auf Ihre Seite ausgefüllt von $name.\n".
    "E-Mail Adresse: $besucher_mail\n".
    "Nachricht:\n $nachricht".

$to = 'lenapopp8@gmail.com';
$headers = "Von: $email_von \r\n";

mail($to, $email_betreff, $email_nachricht, $headers);

