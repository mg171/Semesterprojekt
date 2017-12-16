<?php

if (isset($_GET["id"])) {
    $id_loeschen = $_GET["id"];
    unset($_SESSION["warenkorb"][$id_loeschen]);
    echo "Der Artikel wurde erfolgreich entfernt.";
}

else {
    echo "Die Seite wurde nicht gefunden";
}
