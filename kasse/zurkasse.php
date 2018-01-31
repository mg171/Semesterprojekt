<div id="homewrapper">

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

            <br><br>

            Vorname: <input class="checkout" type='text' name="vorname" required><br>
            Nachname: <input type="text" name="nachname" required><br>
            E-Mail-Adresse: <input type="text" name="email" required><br>
            Straße: <input type="text" name="strasse" required><br>
            Hausnummer: <input type="text" name="hausnummer" required><br>
            Postleitzahl: <input type="text" name="plz" required><br>
            Stadt: <input type="text" name="stadt" required><br>

            <br><br>


            <h3>Zahlungsart</h3><br>
            <input type="radio" id="nn" name="zahlmethode" value="Rechnung" required>
            <label for="mc"> Rechnung</label><br>
            <input type="radio" id="nn" name="zahlmethode" value="Kreditkarte" required>
            <label for="kk"> Kreditkarte</label>

            <br><br><br>

            <h3>Rechtliches</h3><br>
            <input type="radio" id="agb" name="agb" value="agb" required>
            <label for="mc"> Hiermit akzeptiere ich die <a href="index.php?page=agb&action=agb">AGB</a>.</label>

            <br><br>


            <input class="bestellen" type="submit" value="Jetzt kostenpflichtig bestellen">
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

</div>
