<?php

session_start();
include "db/userdata.php";
$anzahl = $_POST['anzahl'];
$id = $_POST['id'];

// Die Session für den Warenkorb wird angelegt

$_SESSION['warenkorb'][] = array('id' => "$id", 'anzahl' => "$anzahl");

header('Location: ../index.php?page=warenkorb');