<?php
include_once('db/userdata.php');

$test_cart = array(1 => 2);
$cart_items = $test_cart;
// $cart_items = $_SESSION["cart"];
$cart_count = count($cart_items);
$cart_ids = "";
foreach ($cart_items  AS $prod_id => $prod_qty) {
    if ($i == $cart_count - 1) {
        $cart_ids .= "'". $prod_id ."')";
    }
    else {
        $cart_ids .= "'". $prod_id ."', ";
    }
}
?>
<form action="index.php?page=cart&cart=update" method="post">
    <div class="cartbox">

        <div class="cart_header">

            <div class="box">
                <span class="cartlabel">Löschen</span>
            </div>
            <div class="box">
                <span class="cartlabel">Bild</span>
            </div>
            <div class="box">
                <span class="cartlabel">Beschreibung</span>
            </div>
            <div class="box">
                <span class="cartlabel">Preis</span>
            </div>
            <div class="box">
                <span class="cartlabel">Menge</span>
            </div>
            <div class="box">
                <span class="cartlabel">Gesamt</span>
            </div>
        </div>


        <?php
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $sql_warenkorb = "SELECT * FROM produkt WHERE id IN (".$cart_ids;
        foreach ($pdo->query($sql_warenkorb) as $row) {

            $bildpfad = $row['bild'];

            $endsumme += $row['preis'] * $cart_items[$row['id']];
            echo "
    <div class='cart_row'>
    <div class='box'>
        <a href='index.php?page=cart&cart=delete&id=.".$row['id']."' class=\"cart_delete vertical_align_middle\">X</a>
    </div>
    <div class='box'>
        <img id='pagephone' src='images/productshots/" . $bildpfad . "' alt='Produktbild'/>
    </div>
    <div class='box'>
        <span class=\"cart_desc vertical_align_middle \">".$row['artikelname']."</span>
    </div>
    <div class='box'>
        <span class=\"cart_price vertical_align_middle \">".$row['preis']." €</span>
    </div>
    <div class='box'>
    <input type='hidden' name='prod_id[]' value='".$row['id']."'>
        <input class=\"quantity vertical_align_middle \" type=\"number\" name=\"quantity[]\" min=\"1\" max=\"9\" step=\"1\" value=\"".$cart_items[$row['id']]."\">
    </div>
    <div class='box'>
        <span class=\"cart_price vertical_align_middle \">".$row['preis'] * $cart_items[$row['id']]." €</span>
    </div>
    </div>";
        }
        ?>


    </div>

    <div class="cart_summary">
        <h2>Warenkorb Summe</h2>
        <div class="summary_table">


        </div>
        <input class="cart_update" type="submit" value="Kasse" name="checkout">
    </div>

</form>