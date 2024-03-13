<?php
session_start();
// Controleer of de gebruiker ingelogd is en de rol 'admin' heeft
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: inloggen.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="js/script.js" defer></script>
</head>

<body>

    <?php include_once("../partials/header.php"); ?>

    <div class="flex-container">
        <aside class="sidebar">
            <!-- Dropdown menu for managing users -->
            <div class="dropdown">
                <button class="btn" data-dropdown="manageUsersDropdown">Manage Users &#9660;</button>
                <div class="dropdown-content" id="manageUsersDropdown">
                    <a href="#" onclick="showContent('manageUsers')">User Overview</a>
                    <a href="#" onclick="showContent('createUserForm')">Add New User</a>
                </div>
            </div>

            <!-- Dropdown menu for managing products -->
            <div class="dropdown">
                <button class="btn" data-dropdown="manageProductsDropdown">Manage Products &#9660;</button>
                <div class="dropdown-content" id="manageProductsDropdown">
                    <a href="#" onclick="showContent('manageProducts')">Product Overview</a>
                    <a href="#" onclick="showContent('createProductForm')">Add New Product</a>
                </div>
            </div>
        </aside>

        <div class="content">
            <h1>Admin Dashboard</h1>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['gebruikersnaam']); ?>!</p>

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
                <form action="verwerk-nieuwe-gebruiker.php" method="post">
                    <!-- Formulier velden voor gebruiker aanmaken -->
                    <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <!-- ... overige velden ... -->
                    <input type="submit" value="Gebruiker Toevoegen">
                </form>
            </div>

            <div id="createProductForm" class="dynamic-content" style="display: none;">
                <!-- Formulier voor product aanmaken -->
                <h2>Product aanmaken</h2>
                <form action="controllers/verwerk-nieuwe-producten.php" method="post" enctype="multipart/form-data">
                    <!-- Formulier velden voor product aanmaken -->
                    <input type="text" name="naam" placeholder="Productnaam" required>
                    <textarea name="beschrijving" placeholder="Beschrijving" required></textarea>
                    <input type="number" name="prijs" placeholder="Prijs" required>
                    <input type="file" name="foto" required>
                    <input type="submit" value="Product Toevoegen">
                </form>
            </div>

            <!-- Meer dynamische content kan hier toegevoegd worden... -->
        </div>
    </div>

    <?php include_once("../partials/footer.php"); ?>

</body>

</html>