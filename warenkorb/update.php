<?php
session_start();

// Update der im Warenkorb veränderten Inhalte

if (isset($_POST['anzahl']) || isset($_POST['loeschen'])) {
    if (isset($_POST['anzahl'])) {
        $catch = $_POST['menge'];
        foreach ($catch as $temp) {
            $anzahl = $_POST['anzahl'][$temp];
            $_SESSION['warenkorb'][$temp]['anzahl'] = $anzahl;
        }
    }

if (isset ($_POST['loeschen'])) {
    $catch = $_POST['loeschen'];

    foreach ($catch as $temp) {
        unset($_SESSION['warenkorb'][$temp]);
    }

    $count = count($_SESSION['warenkorb']);

    if ($count < 1) {
        unset($_SESSION['warenkorb']);
    }
}

    header('Location: ../index.php?page=warenkorb');
}

else { echo "error"; }