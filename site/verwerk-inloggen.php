<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include '405.php';
    exit;
}

if (!isset($_POST['email']) || !isset($_POST['wachtwoord'])) {
    // Controleer of zowel het e-mailadres als het wachtwoord zijn ingevuld
    header("location: inloggen.php");
    exit;
}

// Haal de ingevoerde waarden op
$email_or_gebruikersnaam = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

// Controleer of de ingevoerde waarde een e-mailadres is of een gebruikersnaam
if (filter_var($email_or_gebruikersnaam, FILTER_VALIDATE_EMAIL)) {
    // De ingevoerde waarde is een e-mailadres
    $where_clause = "email = '$email_or_gebruikersnaam'";
} else {
    // De ingevoerde waarde is een gebruikersnaam
    $where_clause = "gebruikersnaam = '$email_or_gebruikersnaam'";
}

// We hebben een database connectie nodig
require 'database.php';
// We gaan nu het e-mailadres of de gebruikersnaam die is ingevuld vergelijken met de waardes in de database.

$sql = "SELECT * FROM Gebruikers WHERE $where_clause";

// dan voeren we de query uit
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
if (!is_array($user)) {
    // Gebruiker niet gevonden, terugsturen naar inlogpagina
    header("location: inloggen.php");
    exit;
}

// Controleer of het ingevoerde wachtwoord overeenkomt met het opgeslagen wachtwoord in de database
if (password_verify($wachtwoord, $user['wachtwoord'])) {
    // Wachtwoord is correct, start de sessie
    session_start();
    $_SESSION['isIngelogd'] = true;
    $_SESSION['gebruikersnaam'] = $user['gebruikersnaam'];
    $_SESSION['rol'] = $user['rol'];

    switch ($user['rol']) {
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
} else {
    // Wachtwoord is incorrect, terugsturen naar inlogpagina
    header("location: inloggen.php");
    exit;
}

?>
