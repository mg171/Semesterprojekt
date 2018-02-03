<div id='cartwrapper'>

    <?php
    session_start();
    include_once ('db/userdata.php');
    if (isset($_SESSION['warenkorb']))
    {
        ?>
        <div>

            <!-- Formular zur Ausgabe der Inhalte im Warenkorb -->

            <form action="./warenkorb/update.php" method="post">
                <table>
                    <tr>
                        <th>Produkt</th>
                        <th>Preis</th>
                        <th>Anzahl</th>
                        <th>Gesamt</th>
                        <th>Löschen</th>
                    </tr>

                    <?php
                    $db = new PDO($dsn, $dbuser, $dbpass);
                    $preisgesamt = 0;
                    foreach ($_SESSION['warenkorb'] as $key => $cart){

                        // Ausgabe der Daten auf Basis der ID aus Tabelle Produkt

                        $stmt = $db->query("SELECT * FROM produkt WHERE id='".$cart['id']."'");
                        $result = $stmt->fetch();
                        $menge = $key;
                        $prod_gesamt = $result['preis']*$cart['anzahl'];
                        $preisgesamt = $preisgesamt + $prod_gesamt;
                        ?>
                        <tr>
                            <td><a href="?page=product&product=show&id=<?php echo $result['id']?>">
                                    <?=$result['artikelname'];?>
                                </a></td>
                            <td><?=$result['preis'].'€';?></td>
                            <td><input type="number" name="anzahl[<?=$menge;?>]" value="<?=$cart['anzahl'];?>" min="1"</td>
                            <td><?=$prod_gesamt.'€';?></td>
                            <td><input type="checkbox" name="loeschen[]" value="<?=$key;?>"></td>
                            <input type="hidden" name="menge[]" value="<?=$menge;?>"
                        </tr>
                    <?php }
                    ?>
                </table><br>
                <?php echo "Der Gesamtbetrag des Warenkorbs beträgt aktuell " .$preisgesamt ."€."; ?>
                <br><br>

                <input class="warenkorb" type="submit" value="aktualisieren">
            </form>
        </div>

            <!-- Formular zum Übertragung der Daten zur Kasse -->

        <form action="?page=kasse&action=zurkasse" method="post">
            <input class="warenkorb" type="submit" value="Zur Kasse">
        </form>

    <?php }
    else
    { ?>
        <div>
            <h2>Keine Artikel im Warenkorb</h2><br>

            <form>
                <input type="button" value="zurück zur Startseite" onclick="window.location.href='?'"/>
            </form>
        </div>

    <?php } ?>
</div>
