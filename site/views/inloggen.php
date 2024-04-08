<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Interactive - Inloggen</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:wght@200&family=Jost:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once("../partials/header.php"); ?>

    <div class="login-container">
        <h2>Inloggen</h2>
        <form action="../controllers/verwerk-inloggen.php" method="post">
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

    <?php require_once("../partials/footer.php"); ?>
</body>

</html>