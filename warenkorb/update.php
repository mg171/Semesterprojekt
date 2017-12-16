<?php

if($_POST["update"]) {
    $prod_id = $_POST['prod_id'];
    $new_qty = $_POST['quantity'];
    foreach( $prod_id as $key => $id ) {
        $_SESSION["warenkorb"][$id] = $new_qty[$key];
    }
}

if($_POST["checkout"]) {
    include_once('warenkorb/checkout.php');

}
