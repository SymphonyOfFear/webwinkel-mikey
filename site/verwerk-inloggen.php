<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include '405.php';
    exit;
}

if (!isset($_POST['email'])) {
    // We controleren of de key email in de POST-array bestaat
    header("location: inloggen.php");
    exit;
}

// daarna controleren of het emailadress is ingevuld (dus niet leeg)
if (empty($_POST['email'])) {
    header("location: inloggen.php");
    exit;
}

// dan komt hier de rest van de code....

// het eerste input field met een name attribuut `email`
$email = $_POST['email'];

// We hebben een database connectie nodig
require 'database.php';
// We gaan nu het emailadres dat is ingevuld vergelijken met de waardes in de database.

$sql = "SELECT * FROM Gebruikers WHERE email = '$email' ";

// dan voeren we de query uit
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
if (!is_array($user)) {

    header("location: inloggen.php");
    echo "De gebruiker heeft het correcte email-adres ingevuld!";
}


if ($user['wachtwoord'] === $_POST['wachtwoord']) {

    session_start();
    $_SESSION['isIngelogd'] = true;
    $_SESSION['voornaam'] = $user['voornaam'];
    $_SESSION['role'] = $user['role'];

    switch ($user['role']) {
        case 'admin':
            header("location: admin-dashboard.php");
            
        break;
        case 'medewerker':
            header("location: dashboard.php");
           
            break;
        case 'klant':
            header("location: index.php");
          
            break;
        default:
            header("location: index.php");
            break;
    }
    exit;
}

header("location: dashboard.php");
exit;

?>