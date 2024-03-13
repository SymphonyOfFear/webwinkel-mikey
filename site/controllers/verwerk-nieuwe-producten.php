<?php
session_start();
require '../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include '405.php';
    exit;
}

// Validate and sanitize input data
$naam = isset($_POST['naam']) ? htmlspecialchars($_POST['naam']) : '';
$beschrijving = isset($_POST['beschrijving']) ? htmlspecialchars($_POST['beschrijving']) : '';
$prijs = isset($_POST['prijs']) ? filter_var($_POST['prijs'], FILTER_VALIDATE_FLOAT) : 0.0;

// Check if inputs are not empty
if (empty($naam) || empty($beschrijving) || $prijs === false) {
    echo "Invalid input data";
    exit;
}

// File upload handling
if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
    // Handle file upload error
    echo "File upload error.";
    exit;
}

$fileContent = file_get_contents($_FILES['foto']['tmp_name']);
$fileName = $_FILES['foto']['name'];

// Check if uploaded file is an image
$allowedTypes = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
$detectedType = exif_imagetype($_FILES['foto']['tmp_name']);
if (!in_array($detectedType, $allowedTypes)) {
    echo "Invalid file type. Only GIF, JPEG, and PNG files are allowed.";
    exit;
}

// Check file size
$maxFileSize = 5 * 1024 * 1024; // 5 MB
if ($_FILES['foto']['size'] > $maxFileSize) {
    echo "File size exceeds the maximum allowed size (5MB).";
    exit;
}

// Prepare and execute the SQL statement
$sql = "INSERT INTO Producten (naam, beschrijving, prijs, foto) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $naam);
$stmt->bindParam(2, $beschrijving);
$stmt->bindParam(3, $prijs);
$stmt->bindParam(4, $fileContent);

if ($stmt->execute()) {
    // Redirect after execution
    header("Location: producten.php");
    exit;
} else {
    echo "Error adding product";
}
