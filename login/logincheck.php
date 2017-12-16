<?php

session_start();

if (isset($_GET["login"])) {

    if (isset($_POST["user_name"]) AND isset($_POST["passwort"])) {
        include "db/userdata.php";
        $password = md5($_POST["passwort"]);
        $stmt = $db->prepare("SELECT * FROM user WHERE user_name=:user_name AND passwort=:passwort");
        $stmt->bindParam(":user_name", $_POST["user_name"]);
        $stmt->bindParam(":passwort", $passwort);
        if (!$stmt->execute()) {
            echo "Datenbank-Fehler (S01)";
            $arr = $stmt->errorInfo();
            print_r($arr);
            die();
        }

        if (!$row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Nutzer nicht gefunden";
            die();
        } else {
            echo "angemeldet !";
        }


    } else {
        echo "Fehler- zu wenig Parameter";
    }
}