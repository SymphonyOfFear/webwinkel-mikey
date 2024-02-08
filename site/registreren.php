<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - Enigma Interactive</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:wght@200&family=Jost:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<?php include_once("header.php");?>

    <div class="login-container">
        <h2>Registreren</h2>
        <form action="verwerk-nieuwe-gebruiker.php" method="POST">
            <div class="form-group">
                <label for="username">Gebruikersnaam</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" id="wachtwoord" name="wachtwoord" required>
            </div>
            <div class="form-group">
                <label for="bevestig_wachtwoord">Bevestig Wachtwoord</label>
                <input type="password" id="bevestig_wachtwoord" name="bevestig_wachtwoord" required>
            </div>
            <button type="submit" class="btn">Registreren</button>
        </form>
        <div class="links">
            <a href="inloggen.php">Heb je al een account? Log hier in</a>
        </div>
    </div>

    <?php include_once("footer.php");?>

    <script src="js/script.js"></script>
</body>
</html>
