<div id="homewrapper">
<?php
session_start();
include_once("db/userdata.php");

if (isset($_GET["login"])) {

}

// Login und Passwort müssen ausgefüllt werden

if ( isset($_POST['login']) && isset($_POST['password']) ) {

    // Im Login wird nicht zwischen Groß- und Kleinschreibung unterschieden

    $login = strtolower($_POST['login']);
    $password = $_POST['password'];

    // Abgleich der eingegebenen Daten mit denen aus der DB

    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $statement = $pdo->prepare("SELECT * FROM loginweb WHERE login = :login");
    $result = $statement->execute(array('login' => $login));
    $user = $statement->fetch();

    // Überprüfung Passwort

    if ($user !== false && md5($password)==$user['password']) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        header('Location: backend/produkt.php');

    } else {
        $fehlermeldung = "Fehler: Benutzername oder Passwort ungültig<br> ";
    }

}
?>


<?php
if(isset($fehlermeldung)) {
    echo $fehlermeldung;
}

if(isset($_SESSION['userid'])) {

    echo "Du bist bereits angemeldet.";

} else {

    ?>

    <!-- Eingabe der Daten über Formular -->

<br>
    <h1 id=h1>Login</h1><br>
    <form action="index.php?page=login&action=login" method="post">
        <input type="text" class="loginform" name="login" placeholder="Benutzername"><br>
        <input type="password" class="loginform" name="password" placeholder="Passwort"><br>
        <input type="submit" class="loginform" value="anmelden">
    </form>


    <?php
}
?>
</div>
