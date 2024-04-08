<?php
session_start();
require 'app/config/database.php';

// Fetch featured products with a join to include category names (assuming a category table exists)
$stmt_featured = $conn->prepare("
    SELECT p.*, c.categorie_naam 
    FROM Producten p 
    INNER JOIN UitgelichteProducten u ON p.product_id = u.product_id 
    INNER JOIN Categorieen c ON p.categorie_id = c.categorie_id 
    WHERE u.is_uitgelicht = 1
");
$stmt_featured->execute();
$featured_producten = $stmt_featured->fetchAll(PDO::FETCH_ASSOC);

// Fetch all products, potentially including a join for category names
$stmt_all = $conn->prepare("
    SELECT p.*, c.categorie_naam 
    FROM Producten p
    INNER JOIN Categorieen c ON p.categorie_id = c.categorie_id
");
$stmt_all->execute();
$producten = $stmt_all->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Interactive</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:wght@200&family=Jost:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <?php require 'partials/header.php'; ?>

    <div class="hero-container">
        <div class="hero-section">
            <h1>Welkom in onze winkel</h1>
            <p>Ontdek onze nieuwste producten en trends.</p>
            <a href="producten.php" class="btn">Nu ontdekken &#8594;</a>
        </div>
    </div>

    <div class="content-container">
        <div class="content-section">
            <h2 class="content-title">Uitgelichte Producten</h2>

            <div class="row">
                <?php foreach ($featured_producten as $product) : ?>
                    <div class="col-4 product">
                        <img src="<?php echo isset($product['foto']) ? '../assets/images/' . $product['foto'] : 'https://placehold.co/200' ?>" alt="<?php echo htmlspecialchars($product['naam']); ?>">
                        <h4><?php echo htmlspecialchars($product['naam']); ?></h4>
                        <p>&euro; <?php echo htmlspecialchars($product['prijs']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php require 'partials/footer.php'; ?>
</body>

</html>