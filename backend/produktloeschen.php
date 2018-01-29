<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Onlineshop</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/2ab6c8da3b.js"></script>
    <style>
        body { margin: 40px; }
    </style>
</head>

<?php
session_start();

//Berechtigung prüfen

if (!isset($_SESSION["login"]))
{
    header("location:./index.php");
}