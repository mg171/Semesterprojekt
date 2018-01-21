<div id='cartwrapper'>

    <?php
    session_start();
    include_once ('db/userdata.php');
    if (isset($_SESSION['warenkorb']))
    {
        ?>
        <div>
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
                            <td><input type="checkbox" name="loeschen[]" value="<?=$key;?>"></td>
                        </tr>
                    <?php }
                    ?>
                </table>

                <input class="warenkorb" type="submit" value="aktualisieren">
            </form>
        </div>



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
