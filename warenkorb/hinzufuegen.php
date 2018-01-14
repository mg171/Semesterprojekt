<?php
session_start();
include "db/userdata.php";
$anzahl = $_POST['anzahl'];
$id = $_POST['id'];

$_SESSION['warenkorb'][] = array('id' => "$id", 'anzahl' => "$anzahl");

header('Location: ../index.php?page=warenkorb');
?>