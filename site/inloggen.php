<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Inloggen</title>
</head>
<body>
    <header>
        <h1>Inloggen</h1>
    </header>

    <section class="content">
        <form action="login_process.php" method="POST">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Inloggen</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Mijn Webshop</p>
    </footer>
</body>
</html>
