<?php
session_start();
// Controleer of de gebruiker is ingelogd en een beheerder is
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: inloggen.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Interactive</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:wght@200&family=Jost:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" alt="Enigma Interactive Logo">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="producten.php">Producten</a></li>
                        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') : ?>
                            <li><a href="admin-dashboard.php">Admin Dashboard</a></li>
                        <?php elseif (isset($_SESSION['rol']) && $_SESSION['rol'] === 'medewerker') : ?>
                            <li><a href="dashboard.php">Medewerker Dashboard</a></li>
                        <?php endif; ?>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-btn">Account</a>
                            <div class="dropdown-content">
                                <?php if (isset($_SESSION['user_id'])) : ?>
                                    <a href="#">Instellingen</a>
                                    <a href="logout.php">Uitloggen</a>
                                <?php else : ?>
                                    <a href="inloggen.php">Inloggen</a>
                                    <a href="registreren.php">Registreren</a>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="flex-container"> <!-- Start van flex-container -->
        <aside class="sidebar">
            <!-- Dropdown menu for managing users -->
            <div class="dropdown">
                <button class="btn" data-target="manageUsersDropdown">Manage Users &#9660;</button>
                <div class="dropdown-content" id="manageUsersDropdown">
                    <a href="#" onclick="showContent('manageUsers')">User Overview</a>
                    <a href="#" onclick="showContent('createUserForm')">Add New User</a>
                </div>
            </div>

            <!-- Dropdown menu for managing products -->
            <div class="dropdown">
                <button class="btn" data-target="manageProductsDropdown">Manage Products &#9660;</button>
                <div class="dropdown-content" id="manageProductsDropdown">
                    <a href="#" onclick="showContent('manageProducts')">Product Overview</a>
                    <a href="#" onclick="showContent('createProductForm')">Add New Product</a>
                </div>
            </div>
        </aside>

        <div class="content">
            <h1>Admin Dashboard</h1>
            <p>Welkom, <?php echo $_SESSION['gebruikersnaam']; ?>!</p>

            <!-- Plaatsaanduiding voor dynamische inhoud -->
            <div id="manageUsers" class="dynamic-content" style="display: none;">
                <!-- Inhoud voor gebruikersbeheer -->
                <h2>Gebruikers beheren</h2>
                <!-- Voeg hier je tabel in voor het beheren van gebruikers -->
                <table class="user-table">
                    <!-- Tabelinhoud -->
                </table>
            </div>

            <div id="manageProducts" class="dynamic-content" style="display: none;">
                <!-- Inhoud voor productbeheer -->
                <h2>Producten beheren</h2>
                <!-- Voeg hier je tabel in voor het beheren van producten -->
                <table class="product-table">
                    <!-- Tabelinhoud -->
                </table>
            </div>

            <div id="createUserForm" class="dynamic-content" style="display: none;">
                <!-- Formulier voor gebruiker aanmaken -->
                <h2>Gebruiker aanmaken</h2>
                <form action="create_user.php" method="post">
                    <!-- Formulier velden voor gebruiker aanmaken -->
                </form>
            </div>

            <div id="createProductForm" class="dynamic-content" style="display: none;">
                <!-- Formulier voor product aanmaken -->
                <h2>Product aanmaken</h2>
                <form action="create_product.php" method="post">
                    <!-- Formulier velden voor product aanmaken -->
                </form>
            </div>
            <!-- Inhoud die verandert bij het klikken op knoppen wordt hier geladen -->
        </div>
    </div>
    </div> <!-- Einde van flex-container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <img src="images/logo.png" alt="Enigma Interactive Logo">
                    <p>Ons doel is om de beste kwaliteitsproducten te leveren met uitzonderlijke service.</p>
                </div>
                <div class="footer-col">
                    <h3>Volg ons</h3>
                    <ul class="social-links">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <p class="footer-bottom-text">
                Alle rechten voorbehouden door &copy;Enigma Interactive 2024
            </p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>