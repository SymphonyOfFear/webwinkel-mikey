<?php
session_start();
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Methode Niet Toegestaan", true, 405);
    include '405.php'; // Zorg ervoor dat het 405.php bestand bestaat.
    exit;
}

// Invoer valideren en ontsmetten
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Ongeldig e-mailformaat");
}
$wachtwoord = $_POST['wachtwoord']; // Overweeg een sterk wachtwoordbeleid te handhaven
$voornaam = filter_var($_POST['voornaam']);
$achternaam = filter_var($_POST['achternaam']);
$telefoonnummer = filter_var($_POST['telefoonnummer']);
$adres = filter_var($_POST['adres']);
$stad = filter_var($_POST['stad']);

// Wachtwoord hashen
$gehasht_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

// SQL statement voorbereiden om SQL-injectie te voorkomen
$stmt = $conn->prepare("INSERT INTO Gebruikers (email, wachtwoord, voornaam, achternaam, telefoonnummer, adres, stad) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $email, $gehasht_wachtwoord, $voornaam, $achternaam, $telefoonnummer, $adres, $stad);

// Het voorbereide statement uitvoeren
if ($stmt->execute()) {
    // Omleiden naar de inlogpagina na succesvolle registratie
    header("Location: inloggen.php");
    exit;
} else {
    // Foutmelding
    echo "Fout bij het uitvoeren: " . $stmt->error;
}

// Statement en verbinding sluiten
$stmt->close();
$conn->close();
