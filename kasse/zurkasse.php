<?php
session_start();
include_once ('db/userdata.php');
if (isset($_SESSION['warenkorb']))
{
    ?>
    <div>
        <form action="./kasse/checkout.php" method="post">
            <table>
                <tr>
                    <th>Produkt</th>
                    <th>Preis</th>
                    <th>Anzahl</th>
                    <th>Gesamt</th>
                </tr>

                <?php
                $db = new PDO($dsn, $dbuser, $dbpass);
                foreach ($_SESSION['warenkorb'] as $key => $cart){

                    $stmt = $db->query("SELECT * FROM produkt WHERE id='".$cart['id']."'");
                    $result = $stmt->fetch();
                    ?>
                    <tr>
                        <td><a href="?page=product&product=show&id=<?php echo $result['id']?>">
                                <?=$result['artikelname'];?>
                            </a></td>
                        <td><?=$result['preis'].'€';?></td>
                        <td><?=$cart['anzahl'];?></td>
                        <td><?=$result['preis']*$cart['anzahl'].'€';?></td>
                    </tr>
                <?php }
                ?>
            </table>

            </br></br>
            <fieldset>
                <legend> Zahlungsart </legend>
                <input type="radio" id="vk" name="zahlmethode" value="vorkasse" required>
                <label for="vk"> Vorkasse</label>
                <input type="radio" id="vi" name="zahlmethode" value="kreditkarte">
                <label for="vi"> Kreditkarte</label>
                <input type="radio" id="re" name="zahlmethode" value="rechnung">
                <label for="re"> Rechnung</label>
            </fieldset>

            </br>

            </br>

            <input type="submit" value="checkout">
        </form>

    </div>
<?php }

else
{ ?>
    <div>
        <h3>Es befinden sich keine Artikel im Warenkorb.</h3>
        <form>
            <input type="button" value="zurück zur Startseite" onclick="window.location.href='?'"/>
        </form>
    </div>
<?php } ?>