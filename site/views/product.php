<?php
session_start();
require '../app/config/database.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Product-ID ontbreekt.";
    exit;
}

$product_id = $_GET['id'];
// Aangepast om categorie naam op te nemen
$sql = "
    SELECT p.*, c.categorie_naam 
    FROM Producten p
    INNER JOIN Categorieen c ON p.categorie_id = c.categorie_id 
    WHERE p.product_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $product_id);
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_ASSOC);

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

<body><?php require_once("../partials/header.php"); ?>

    <div class="container">
        <div class="product-details">
            <h2><?php echo $product['naam']; ?></h2>
            <img src="<?php echo isset($product['foto']) ? $product['foto'] : 'https://placehold.co/200' ?>" alt="<?php echo $product['naam'] ?>">
            <p><?php echo $product['beschrijving']; ?></p>
            <p>Prijs: &euro; <?php echo $product['prijs']; ?></p>
        </div>
    </div>

    <?php require_once("../partials/footer.php"); ?>
</body>

</html>