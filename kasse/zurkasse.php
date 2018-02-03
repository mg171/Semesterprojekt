<div id="homewrapper">

<?php
session_start();
include_once ('db/userdata.php');
if (isset($_SESSION['warenkorb']))
{
    ?>

    <!--  Alle Produkte aus dem Warenkorb werden nochmal aufgelistet -->

    <div><h1>Zusammenfassung</h1><br>
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
                $preisgesamt = 0;
                foreach ($_SESSION['warenkorb'] as $key => $cart){

                    $stmt = $db->query("SELECT * FROM produkt WHERE id='".$cart['id']."'");
                    $result = $stmt->fetch();
                    $prod_gesamt = $result['preis']*$cart['anzahl'];
                    $preisgesamt = $preisgesamt + $prod_gesamt;
                    ?>

                    <!-- Hier werden die Preise der Produkte zusammengerechnet und ausgegeben -->

                    <tr>
                        <td><a href="?page=product&product=show&id=<?php echo $result['id']?>">
                                <?=$result['artikelname'];?>
                            </a></td>
                        <td><?=$result['preis'].'€';?></td>
                        <td><?=$cart['anzahl'];?></td>
                        <td><?=$prod_gesamt.'€';?></td>
                    </tr>
                <?php }
                ?>
            </table><br>
            <?php echo "Der Gesamtbetrag des Warenkorbs beträgt " .$preisgesamt ."€"; ?>

            <br><br><br>

            <!-- Formular zur Eingabe der persönlichen Daten des Kunden -->

            <h3>Rechnungsdetails</h3><br>

            Vorname <br><input class="checkout" type='text' name="vorname" required><br><br>
            Nachname <br><input type="text" name="nachname" required><br><br>
            E-Mail-Adresse <br><input type="text" name="email" required><br><br>
            Straße <br><input type="text" name="strasse" required><br><br>
            Hausnummer <br><input type="text" name="hausnummer" required><br><br>
            Postleitzahl <br><input type="text" name="plz" required><br><br>
            Stadt <br><input type="text" name="stadt" required><br>

            <br><br>

            <!-- Hier kann per Radio Buttons die Zahlungsart ausgewählt werden -->


            <h3>Zahlungsart wählen</h3><br>
            <input type="radio" id="nn" name="zahlmethode" value="Rechnung" required>
            <label for="mc"> Rechnung</label><br>
            <input type="radio" id="nn" name="zahlmethode" value="Kreditkarte" required>
            <label for="kk"> Kreditkarte</label>

            <br><br><br>

            <h3>Rechtliches</h3><br>
            <input type="radio" id="agb" name="agb" value="agb" required>
            <label for="mc"> Hiermit akzeptiere ich die <a href="index.php?page=agb&action=agb" target="_blank">AGB</a>.</label>

            <br><br>


            <input class="bestellen" type="submit" value="Jetzt kostenpflichtig bestellen"><br><br>
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
