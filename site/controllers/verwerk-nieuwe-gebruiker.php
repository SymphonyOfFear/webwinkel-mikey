<?php
session_start();
require '../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Methode Niet Toegestaan", true, 405);
    include '405.php';
    exit;
}

if (!isset($_POST['email']) || !isset($_POST['wachtwoord'])) {
    $_SESSION['message'] = 'E-mail en wachtwoord zijn vereist.';
    header("location: inloggen.php");
    exit;
}

$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$gebruikersnaam = isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : '';
$rol = isset($_POST['rol']) ? $_POST['rol'] : 'klant';

$hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

try {
    // Voeg de wachtwoord kolom correct in de INSERT INTO statement
    $stmt = $conn->prepare("INSERT INTO Gebruikers (email, wachtwoord, gebruikersnaam, rol_id) VALUES (?, ?, ?, (SELECT rol_id FROM Rollen WHERE rol_naam = ?))");
    // Voer de query uit met de voorbereide statement en de opgegeven parameters
    $stmt->execute([$email, $hashed_wachtwoord, $gebruikersnaam, $rol]);

    // Sessie variabelen instellen
    $_SESSION['isIngelogd'] = true;
    $_SESSION['gebruikersnaam'] = $gebruikersnaam;
    $_SESSION['rol'] = $rol;

    if ($_SESSION['rol'] != "klant") {
        header("Location: ../views/" . $rol . "-dashboard.php");
    }

    exit;
} catch (PDOException $e) {
    // Foutafhandeling: toon de foutmelding
    echo "Fout bij het toevoegen van gebruiker: " . $e->getMessage();
}
