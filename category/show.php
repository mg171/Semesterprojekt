<div id="brandwrapper">

<?php

// Ausgabe Apple

if ($_GET["category"] == "apple") {

    echo "<h1>iPhones</h1>";

    include_once("db/userdata.php");

    // SQL-Statement zur Ausgabe von Produkten mit Marken_ID = 1

    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT * FROM produkt WHERE marke_id = 1";
    foreach ($pdo->query($sql) as $row) {

        $bildpfad = $row['bild'];

        echo "<div class='hovereffect' id='grid'>";
        echo "
        <img id='singlephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'>
            <div class='overlay'><p><a href='index.php?page=product&product=show&id=".$row['id']."'>ansehen</a></p>";
        echo "</div>";
        echo "</div>";
    }
}


// Ausgabe Samsung

if ($_GET["category"] == "samsung") {

    echo "<h1>Smartphones von Samsung</h1>";

    include_once("db/userdata.php");

    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT * FROM produkt WHERE marke_id = 2";
    foreach ($pdo->query($sql) as $row) {

        $bildpfad = $row['bild'];

        echo "<div class='hovereffect' id='grid'>";
        echo "
        <img id='singlephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'>
            <div class='overlay'><p><a href='index.php?page=product&product=show&id=".$row['id']."'>ansehen</a></p>";
        echo "</div>";
        echo "</div>";
    }
}


// Ausgabe Google

if ($_GET["category"] == "google") {

    echo "<h1>Smartphones von Google</h1>";

    include_once("db/userdata.php");

    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT * FROM produkt WHERE marke_id = 3";
    foreach ($pdo->query($sql) as $row) {

        $bildpfad = $row['bild'];

        echo "<div class='hovereffect' id='grid'>";
        echo "
        <img id='singlephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'>
            <div class='overlay'><p><a href='index.php?page=product&product=show&id=".$row['id']."'>ansehen</a></p>";
        echo "</div>";
        echo "</div>";
    }
}


// Ausgabe Huawei

if ($_GET["category"] == "huawei") {

    echo "<h1>Smartphones von Huawei</h1>";

    include_once("db/userdata.php");

    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT * FROM produkt WHERE marke_id = 4";
    foreach ($pdo->query($sql) as $row) {

        $bildpfad = $row['bild'];

        echo "<div class='hovereffect' id='grid'>";
        echo "
        <img id='singlephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'>
            <div class='overlay'><p><a href='index.php?page=product&product=show&id=".$row['id']."'>ansehen</a></p>";
        echo "</div>";
        echo "</div>";
    }
}


// Ausgabe Motorola

if ($_GET["category"] == "motorola") {

    echo "<h1>Smartphones von Motorola</h1>";

    include_once("db/userdata.php");

    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT * FROM produkt WHERE marke_id = 5";
    foreach ($pdo->query($sql) as $row) {

        $bildpfad = $row['bild'];

        echo "<div class='hovereffect' id='grid'>";
        echo "
        <img id='singlephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'>
            <div class='overlay'><p><a href='index.php?page=product&product=show&id=".$row['id']."'>ansehen</a></p>";
        echo "</div>";
        echo "</div>";
    }
}


// Ausgabe LG

if ($_GET["category"] == "lg") {

    echo "<h1>Smartphones von LG</h1>";

    include_once("db/userdata.php");

    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT * FROM produkt WHERE marke_id = 6";
    foreach ($pdo->query($sql) as $row) {

        $bildpfad = $row['bild'];

        echo "<div class='hovereffect' id='grid'>";
        echo "
        <img id='singlephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'>
            <div class='overlay'><p><a href='index.php?page=product&product=show&id=".$row['id']."'>ansehen</a></p>";
        echo "</div>";
        echo "</div>";
    }
} ?>

</div>
