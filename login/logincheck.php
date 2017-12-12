<?php

session_start();

if (isset($_POST["login"]) AND isset($_POST["password"]))
{
    include "db/userdata.php";
    $password=md5($_POST["password"]);
    $stmt=$db->prepare("SELECT * FROM user WHERE login=:login AND password=:password");
    $stmt->bindParam(":login", $_POST["login"]);
    $stmt->bindParam(":password", $password );
    if(!$stmt->execute()) {
        echo "Datenbank-Fehler (S01)";
        $arr = $stmt->errorInfo();
        print_r($arr);
        die();
    }

    if (!$row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "Nutzer nicht gefunden";
        die();
    }
    else
    {
        $_SESSION["login"]=$row["login"];
        $_SESSION["name"]=$row["name"];
        echo "angemeldet !";
    }


}
else
{
    echo "Fehler- zu wenig Parameter";
}