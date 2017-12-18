<div id="homewrapper">
<?php
session_start();
include_once("db/userdata.php");

if (isset($_GET["login"])) {

}
if ( isset($_POST['login']) && isset($_POST['password']) ) {

    $login = strtolower($_POST['login']);
    $password = $_POST['password'];

    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $statement = $pdo->prepare("SELECT * FROM loginweb WHERE login = :login");
    $result = $statement->execute(array('login' => $login));
    $user = $statement->fetch();

    // Überprüfung Passwort

    if ($user !== false && md5($password)==$user['password']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        die('Der Login war erfolgreich.');

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

<br>
    <h1 id=h1>Login</h1>
    <form action="index.php?page=login&action=login" method="post">
        <input type="text" name="login" placeholder="Benutzername">
        <input type="password" name="password" placeholder="Passwort"><br>
        <input type="submit" value="anmelden">
    </form>


    <?php
}
?>
</div>
