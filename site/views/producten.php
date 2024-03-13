<?php
session_start();
require '../app/config/database.php';

try {
    // Query to fetch tools data
    $stmt = $conn->prepare("SELECT * FROM Producten");
    $stmt->execute();
    $tools = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

require '../partials/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Interactive - Producten</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<main>
    <div class="flex-container">
        <?php foreach ($tools as $tool) : ?>
            <div class="product">
                <?php if (!empty($tool['tool_image'])) : ?>

                    <img src="data:image/jpeg;base64,<?php echo base64_encode($tool['tool_image']); ?>" alt="<?php echo $tool['tool_name']; ?>" class="product-image">
                <?php else : ?>

                    <img src="https://placehold.co/200" alt="Placeholder Image" class="product-image">
                <?php endif; ?>
                <h3 class="product-title"><?php echo $tool['tool_name']; ?></h3>
                <p class="product-price">€ <?php echo number_format($tool['tool_price'] / 100, 2, ',', ''); ?></p>
                <a href="tool_detail.php?id=<?php echo $tool['tool_id']; ?>" class="btn btn-view">Bekijk</a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require '../partials/footer.php'; ?>