<?php
require 'header.php';
require 'database.php';

$sql = "SELECT * FROM Producten";
$result = mysqli_query($conn, $sql);

$producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
 <div class="hero-section">
            <h1>Welkom in onze winkel</h1>
            <p>Ontdek onze nieuwste producten en trends.</p>
            <a href="producten.php" class="btn">Nu ontdekken &#8594;</a>
        </div>
    <div class="small-container">
        <h2 class="title">Aangeboden Producten</h2>
        <div class="row">
            <?php foreach ($producten as $product) : ?>
                <div class="col-4 product">
                    <img src="images/<?php echo htmlspecialchars($product['imgNaam']); ?>" alt="<?php echo htmlspecialchars($product['naam']); ?>">
                    <h4><?php echo htmlspecialchars($product['naam']); ?></h4>
                    <p>&euro; <?php echo htmlspecialchars($product['prijs']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php require 'footer.php'; ?>
