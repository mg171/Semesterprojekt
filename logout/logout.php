<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Webshop Handy</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
</head>

<body>
<div id=homewrapper>

    <?php
    if (isset($_GET["action"])) {

    }
    if ($_GET["action"] == "logout") {

        session_start();
        session_destroy();

        if (isset($_SESSION['userid'])) {

            echo "<br>";
            echo "Der Logout war erfolgreich.";
        }

        else {
            echo "Du bist nicht angemeldet, daher kannst du dich nicht ausloggen.";
        }

    }

    ?>

</div>
</body>
</html>