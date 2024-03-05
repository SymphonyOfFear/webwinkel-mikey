<?php
session_start();
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Methode Niet Toegestaan", true, 405);
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
    $where_clause = "email = ?";
} else {
    // De ingevoerde waarde is een gebruikersnaam
    $where_clause = "gebruikersnaam = ?";
}

try {
    // Bereid de SQL-query voor om SQL-injectie te voorkomen
    $stmt = $conn->prepare("SELECT * FROM Gebruikers WHERE $where_clause LIMIT 1");
    $stmt->execute([$email_or_gebruikersnaam]);
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // Gebruiker niet gevonden, terugsturen naar inlogpagina
        header("location: inloggen.php");
        exit;
    }

    // Controleer of het ingevoerde wachtwoord overeenkomt met het opgeslagen wachtwoord in de database
    if (password_verify($wachtwoord, $user['wachtwoord'])) {
        // Wachtwoord is correct, start de sessie
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
} catch (PDOException $e) {
    // Foutmelding
    echo "Fout bij het uitvoeren: " . $e->getMessage();
}
