<?php
if (isset($_POST["produkt"]) && $_POST["anzahl"] > 0 ) {

    $produkt_id = $_POST["produkt"];
    $anzahl = $_POST["anzahl"];

    if (isset($_SESSION["warenkorb"])) {
        foreach($_SESSION["warenkorb"] as $subkey => $subarray){
            if(isset($subarray["produkt_id"]) == $produkt_id){
                $_SESSION["warenkorb"][$subkey]["anzahl"] += $anzahl;
            } else {
                $hinzufuegen = array("produkt_id" => $produkt_id, "anzahl" => $anzahl);

                array_push($_SESSION["warenkorb"], $hinzufuegen);
            }
        }
    } else {
        $_SESSION["warenkorb"] = array(array("produkt_id" => $produkt_id, "anzahl" => $anzahl));
    }
}
echo "Warenkorb Session:";
print_r($_SESSION["warenkorb"]);
echo "Zum Warenkorb hinzufügen:";
print_r($hinzufuegen);