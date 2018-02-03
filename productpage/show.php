<?php

if ($_GET["product"] == "show") {

    // SQL Statement zur Ausgabe von Produkten, bei denen die Variable $id mit der aus der Tabelle produkt übereinstimmt

    $id = $_GET['id'];
    include_once('db/userdata.php');
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $sql = "SELECT * FROM produkt WHERE id = " . $id;
    $prod = $pdo->query($sql);
    $result = $prod->fetch();

    // Foreach Schleife zur Ausgabe der Produkte

    foreach ($pdo->query($sql) as $row) {

        $bildpfad = $row['bild'];

        echo "<div id='productwrapper'>";
        echo "<img id='pagephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'/>";
        echo "<br><br><h2>" . $row['artikelname'] . "</h2><br><br>";
        echo "<div class='preis'>" . $row['preis'] . " €" . "</div><br><br>";
        echo "<div class='productinfo'>Eancode: " . $row['eancode'] . "<br><br>";
        echo $row['beschreibung'] . "<br></div><br>";

        if ($row['menge']>=5) { echo "Verfügbarkeit: hoch"; }
        else if ($row['menge']==0) { echo "Dieses Produkt ist nicht verfügbar";}
        else { echo "Verfügbarkeit: gering";}


        echo "</div><br><br>";
        ?>

        <!-- Formular zum Hinzufügen von Proukt in den Warenkorb -->

        <form action='./warenkorb/hinzufuegen.php' method='post'>
            <input class='anzahl' type='number' name='anzahl' min='1' step='1' value='1'>
            <input type='hidden' name='id' value='<?php echo $result["id"]; ?>'>
            <input class='warenkorb2' type='submit' value='In den Einkaufswagen'>
        </form>

<?php


    }

}
