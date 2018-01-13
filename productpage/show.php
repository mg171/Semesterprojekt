<?php
if ($_GET["product"] == "show") {

    $id = $_GET['id'];
    include_once('db/userdata.php');
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $sql = "SELECT * FROM produkt WHERE id = " . $id;
    $prod = $pdo->query($sql);
    $result = $prod->fetch();
    foreach ($pdo->query($sql) as $row) {

        $bildpfad = $row['bild'];

        echo "<div id='productwrapper'>";
        echo "<img id='pagephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'/>";
        echo "<br><br><h2>" . $row['artikelname'] . "</h2><br><br>";
        echo "<div class='preis'>" . $row['preis'] . " €" . "</div><br><br>";
        echo "<div class='productinfo'>Eancode: " . $row['eancode'] . "<br><br>";
        echo $row['beschreibung'] . "<br></div>";
        echo "</div><br><br>";
        ?>
        <form action='index.php?page=warenkorb&warenkorb=hinzufuegen' method='post'>
            <input class='anzahl' type='number' name='anzahl' min='1' max='9' step='1' value='1'>
            <input type='hidden' name='produkt' value='<?php echo $result["id"]; ?>'>
            <input class='warenkorb' type='submit' value='In den Einkaufswagen'>
        </form>

<?php


    }

}