<?php
session_start();
require '../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Methode Niet Toegestaan", true, 405);
    include '405.php';
    exit;
}

// Controleer of de basisvelden zijn ingevuld
if (!isset($_POST['email']) || !isset($_POST['wachtwoord'])) {
    header("location: inloggen.php");
    exit;
}

$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$gebruikersnaam = isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : null;
$rol = isset($_POST['rol']) ? $_POST['rol'] : 'klant'; // Standaard rol is 'klant'

// Wachtwoord hashen
$hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

try {
    // Bereid de SQL-query voor om een nieuwe gebruiker toe te voegen
    $stmt = $conn->prepare("INSERT INTO Gebruikers (email, wachtwoord, gebruikersnaam, rol) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $hashed_wachtwoord, $gebruikersnaam, $rol]);

    // Controleer of de actie vanuit de dashboard komt
    if (isset($_POST['from_dashboard']) && $_POST['from_dashboard'] == 'true') {
        // Actie komt van het dashboard, redirect naar admin-dashboard
        header("location: admin-dashboard.php");
    } else {
        // Actie komt van registratieformulier, start sessie en redirect
        $_SESSION['isIngelogd'] = true;
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        $_SESSION['rol'] = $rol;

        // Redirect op basis van rol
        switch ($rol) {
            case 'admin':
                header("location: admin-dashboard.php");
                break;
            case 'beheerder':
                header("location: admin-dashboard.php");
                break;
            case 'klant':
            default:
                header("location: index.php");
                break;
        }
    }
} catch (PDOException $e) {
    echo "Fout bij het toevoegen van gebruiker: " . $e->getMessage();
}
