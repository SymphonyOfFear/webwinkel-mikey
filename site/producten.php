<?php
require 'database.php';

$sql = "SELECT * FROM Producten";
$result = mysqli_query($conn, $sql);

$producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include other CSS stylesheets for your page -->
</head>

<body>
    <!-- Include your header content here -->
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" alt="Logo"> 
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="producten.php">Producten</a></li>
                        <li><a href="about.php">Over ons</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="dropdown">Account
                            <ul class="dropdown_menu">
                                <li><a href="inloggen.php">Inloggen</a></li>
                                <li><a href="nieuwe-gebruiker.php">Registreren</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <img src="images/shopping-cart.png" width="30px" height="30px" alt="Shopping Cart">
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" alt="Menu Icon"> 
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <h1>Welcome to Our Store</h1>
                <p>Discover our latest products and trends.</p>
                <a href="producten.php" class="btn">Explore Now &#8594;</a>
            </div>
            <div class="col-2">
                <img src="images/store-banner.png" alt="Store Banner">
            </div>
        </div>
    </header>
    
    <!-- Featured Products -->
    <div class="small-container">
        <h2 class="title">Aangeboden Producten</h2>
        <div class="row">
            <?php foreach ($producten as $product) : ?>
                <div class="col-4">
                    <div class="product">
                        <img src="images/<?php echo htmlspecialchars($product['imgNaam']); ?>" alt="<?php echo htmlspecialchars($product['naam']); ?>">
                        <h4><?php echo htmlspecialchars($product['naam']); ?></h4>
                        <p>&euro; <?php echo htmlspecialchars($product['prijs']); ?></p>
                        <!-- Add a button or link for more details or purchasing -->
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <!-- Include other sections like Offer Section, Testimonials, Brands, and Footer as needed -->

    <script src="js/script.js"></script>
</body>
</html>
