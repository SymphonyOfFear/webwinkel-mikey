<?php
require 'database.php';

$sql = "SELECT * FROM Producten";
$result = mysqli_query($conn, $sql);

$producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:wght@200&family=Jost:wght@700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<body>
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
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-btn" onclick="toggleDropdown('dropdown-content')">Account</a>
                            <div class="dropdown-content">
                                <a href="inloggen.php">Inloggen</a>
                                <a href="nieuwe-gebruiker.php">Registreren</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="custom-cart-icon" onclick="toggleCart()">🛒</div>
                <div class="menu-icon" onclick="menutoggle()">☰</div>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <h1>Welkom in onze winkel</h1>
                <p>Ontdek onze nieuwste producten en trends.</p>
                <a href="producten.php" class="btn">Nu ontdekken &#8594;</a>
            </div>
            <div class="col-2">
                <img src="images/banner.png" alt="Winkelbanner">
            </div>
        </div>
    </header>

    <!-- Aangeboden Producten -->
    <div class="small-container">
        <h2 class="title">Aangeboden Producten</h2>
        <div class="row">
            <?php foreach ($producten as $product) : ?>
                <div class="col-4">
                    <img src="images/<?php echo htmlspecialchars($product['imgNaam']); ?>" alt="<?php echo htmlspecialchars($product['naam']); ?>">
                    <h4><?php echo htmlspecialchars($product['naam']); ?></h4>
                    <p>&euro; <?php echo htmlspecialchars($product['prijs']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Aanbiedingsectie -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/exclusive-product.png" class="offer-img" alt="Exclusief Product">
                </div>
                <div class="col-2">
                    <p>Exclusief verkrijgbaar in onze winkel!</p>
                    <h1>Speciale Productnaam</h1>
                    <small>Beschrijving van het speciale product met nadruk op de functies en voordelen. Dit is een beperkt aanbod.</small>
                    <a href="product.php?id=special" class="btn">Nu bestellen &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <p>"Geweldige klantenservice en geweldige kwaliteitsproducten. Zeer aanbevolen!"</p>
                    <img src="images/customer-1.png" alt="Klantgetuigenis">
                    <h3>Jane Doe</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Merken -->
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/brand1.png" alt="Merklogo">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download de App</h3>
                    <p>Download onze app voor Android- en iOS-apparaten</p>
                    <div class="app-logo">
                        <img src="images/play-store.png" alt="Play Store">
                        <img src="images/app-store.png" alt="App Store">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo.png" alt="Bedrijfslogo">
                    <p>Ons doel is om de beste kwaliteitsproducten te leveren met uitzonderlijke service.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Nuttige Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blogbericht</li>
                        <li>Retourbeleid</li>
                        <li>Word lid van het partnerprogramma</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Volg ons</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>YouTube</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div id="cart-dropdown" class="cart-dropdown">
        <!-- Voeg hier je winkelwageninhoud toe -->
    </div>
    <script src="js/script.js"></script>
</body>
</html>
