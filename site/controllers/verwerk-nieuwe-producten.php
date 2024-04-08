<?php
session_start();
require '../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include '405.php';
    exit;
}

$naam = isset($_POST['naam']) ? htmlspecialchars($_POST['naam']) : '';
$beschrijving = isset($_POST['beschrijving']) ? htmlspecialchars($_POST['beschrijving']) : '';
$prijs = isset($_POST['prijs']) ? filter_var($_POST['prijs'], FILTER_VALIDATE_FLOAT) : 0.0;
$processor = isset($_POST['processor']) ? htmlspecialchars($_POST['processor']) : '';
$ram = isset($_POST['ram']) ? htmlspecialchars($_POST['ram']) : '';
$storage = isset($_POST['storage']) ? htmlspecialchars($_POST['storage']) : '';
$graphics_card = isset($_POST['graphics_card']) ? htmlspecialchars($_POST['graphics_card']) : '';
$features = isset($_POST['features']) ? htmlspecialchars($_POST['features']) : '';

if (empty($naam) || empty($beschrijving) || $prijs === false || empty($processor) || empty($ram) || empty($storage) || empty($graphics_card) || empty($features)) {
    $_SESSION['message'] = "Invalid input data";
    header("Location: ../admin-dashboard.php?status=producterror");
    exit;
}

if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
    $_SESSION['message'] = "File upload error.";
    header("Location: ../admin-dashboard.php?status=fileuploaderror");
    exit;
}

$fileName = $_FILES['foto']['name'];
$fileContent = file_get_contents($_FILES['foto']['tmp_name']);
$allowedTypes = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
$detectedType = exif_imagetype($_FILES['foto']['tmp_name']);

if (!in_array($detectedType, $allowedTypes)) {
    $_SESSION['message'] = "Invalid file type. Only GIF, JPEG, and PNG files are allowed.";
    header("Location: ../admin-dashboard.php?status=filetypeerror");
    exit;
}

$maxFileSize = 5 * 1024 * 1024; // 5 MB
if ($_FILES['foto']['size'] > $maxFileSize) {
    $_SESSION['message'] = "File size exceeds the maximum allowed size (5MB).";
    header("Location: ../admin-dashboard.php?status=filesizeerror");
    exit;
}

$sql = "INSERT INTO Producten (naam, beschrijving, prijs, processor, ram, storage, graphics_card, features, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    $_SESSION['message'] = "Error preparing statement.";
    header("Location: ../admin-dashboard.php?status=sqlerror");
    exit;
}

// Binding parameters one by one
$stmt->bindParam('ssd', $naam, $beschrijving, $prijs);
$stmt->bindParam('s', $processor);
$stmt->bindParam('s', $ram);
$stmt->bindParam('s', $storage);
$stmt->bindParam('s', $graphics_card);
$stmt->bindParam('s', $features);
$stmt->bindParam('b', $fileContent); // 'b' for blob data

if ($stmt->execute()) {
    header("Location: ../admin-dashboard.php?status=success");
    exit;
} else {
    $_SESSION['message'] = "Error adding product.";
    header("Location: ../admin-dashboard.php?status=addError");
    exit;
}
