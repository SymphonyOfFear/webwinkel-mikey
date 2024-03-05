<?php
session_start();
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Methode Niet Toegestaan", true, 405);
    include '405.php';
    exit;
}

// Validate and sanitize input data
$naam = isset($_POST['naam']) ? htmlspecialchars($_POST['naam']) : '';
$beschrijving = isset($_POST['beschrijving']) ? htmlspecialchars($_POST['beschrijving']) : '';
$prijs = isset($_POST['prijs']) ? floatval($_POST['prijs']) : 0.0;
$foto = isset($_POST['foto']) ? htmlspecialchars($_POST['foto']) : '';

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO Producten (naam, beschrijving, prijs, foto) VALUES (?, ?, ?, ?)");
$stmt->execute([$naam, $beschrijving, $prijs, $foto]);

// Redirect after execution
header("Location: producten.php");
exit;
