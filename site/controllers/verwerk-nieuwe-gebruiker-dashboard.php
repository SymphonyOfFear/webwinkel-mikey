<?php
session_start();
require '../app/config/database.php';

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Methode Niet Toegestaan", true, 405);
    exit;
}

// Check if the user is logged in and has the right role
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] !== 'Admin' && $_SESSION['rol'] !== 'Eigenaar')) {
    $_SESSION['message'] = 'Geen toegang. Alleen voor admins en eigenaars.';
    header("location: ../inloggen.php");
    exit;
}

// Validate required fields
if (!isset($_POST['email']) || !isset($_POST['wachtwoord']) || empty(trim($_POST['email'])) || empty(trim($_POST['wachtwoord']))) {
    $_SESSION['message'] = 'E-mail en wachtwoord zijn vereist.';
    header("Location: ../admin-dashboard.php"); // Adjust redirect as necessary
    exit;
}

$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$gebruikersnaam = isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : '';
$rol = isset($_POST['rol']) ? $_POST['rol'] : 'klant'; // Default role if not specified

// Hash the password
$hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

try {
    // Prepare SQL statement to insert a new user
    // Make sure your table and column names match your database schema
    $stmt = $conn->prepare("INSERT INTO Gebruikers (email, wachtwoord, gebruikersnaam, rol_id) VALUES (?, ?, ?, (SELECT rol_id FROM Rollen WHERE rol_naam = ?))");

    // Execute the statement with the provided parameters
    $stmt->execute([$email, $hashed_wachtwoord, $gebruikersnaam, $rol]);

    // Redirect back to the admin dashboard with a success message or similar
    $_SESSION['message'] = 'Gebruiker succesvol toegevoegd.';
    header("Location: ../admin-dashboard.php"); // Adjust the path as necessary
    exit;
} catch (PDOException $e) {
    // Handle any errors
    $_SESSION['message'] = "Fout bij het toevoegen van gebruiker: " . $e->getMessage();
    header("Location: ../admin-dashboard.php"); // Adjust the path as necessary
    exit;
}
