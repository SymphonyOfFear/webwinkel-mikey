<?php

session_start(); // Start de sessie

require '../app/config/database.php'; // Inclusief het bestand met databaseverbinding

// Controleer of er een product-ID is opgegeven in de URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Product-ID ontbreekt.";
    exit;
}

// Haal het product op uit de database op basis van het opgegeven ID
$product_id = $_GET['id'];
$sql = "SELECT * FROM Producten WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam("i", $product_id);
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Controleer of het product bestaat
if (!$product) {
    echo "Product niet gevonden.";
    exit;
}

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Interactive - Product Info</title>
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:wght@200&family=Jost:wght@700&display=swap" rel="stylesheet">
</head>

<?php include_once("../partials/header.php"); ?>


<div class="container">
    <div class="product-details">
        <h2><?php echo $product['naam']; ?></h2>
        <img src="<?php echo isset($product['foto']) ? $product['foto'] : 'https://placehold.co/200' ?>" alt="<?php echo $product['naam'] ?>">
        <p><?php echo $product['beschrijving']; ?></p>
        <p>Prijs: &euro; <?php echo $product['prijs']; ?></p>
    </div>
</div>
<?php include_once("../partials/footer.php"); ?>