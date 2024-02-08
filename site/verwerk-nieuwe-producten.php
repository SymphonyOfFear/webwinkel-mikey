<?php
session_start();
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Methode Niet Toegestaan", true, 405);
    include '405.php';
    exit;
}


$naam = filter_var($_POST['naam'], FILTER_SANITIZE_STRING);
$beschrijving = filter_var($_POST['beschrijving'], FILTER_SANITIZE_STRING);
$prijs = filter_var($_POST['prijs'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$foto = filter_var($_POST['foto'], FILTER_SANITIZE_URL);


$stmt = $conn->prepare("INSERT INTO Producten (naam, beschrijving, prijs, foto) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $naam, $beschrijving, $prijs, $foto);


if ($stmt->execute()) {
    
    header("Location: producten.php");
    exit;
} else {
  
    echo "Fout bij het uitvoeren: " . $stmt->error;
}

$stmt->close();
$conn->close();