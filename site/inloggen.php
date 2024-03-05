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


    <div class="login-container">
        <h2>Inloggen</h2>
        <form action="verwerk-inloggen.php" method="post">
            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Wachtwoord:</label>
                <input type="password" id="wachtwoord" name="wachtwoord" required>
            </div>
            <button type="submit" name="submit" class="btn">Inloggen</button>
        </form>
        <div class="links">
            <a href="#">Wachtwoord vergeten?</a>
            <a href="registreren.php">Nog geen account? Registreer hier.</a>
        </div>
    </div>

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