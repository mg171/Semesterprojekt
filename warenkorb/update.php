<?php
session_start();
if (isset ($_POST['loeschen'])) {
    $catch = $_POST['loeschen'];

    foreach ($catch as $temp) {
        unset($_SESSION['warenkorb'][$temp]);
    }

    $count = count($_SESSION['warenkorb']);

    if ($count < 1) {
        unset($_SESSION['warenkorb']);
    }

    header('Location: ../index.php?page=warenkorb');
}

else { echo "error"; }