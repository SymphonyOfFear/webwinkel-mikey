<?php
session_start();
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $foto = $_POST['foto']; 

    $sql = "INSERT INTO Producten (naam, beschrijving, prijs, foto) VALUES ('$naam', '$beschrijving', '$prijs', '$foto')";
    mysqli_query($conn, $sql);

    header("Location: beheer_producten.php");
    exit;
}
?>
