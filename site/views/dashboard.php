<?php
session_start();

// Redirect if not an employee
if ($user['rol_naam'] === 'Klant') {
    header("Location: ./index.php");
}

// Additional PHP functionality goes here
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Interactive - Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:wght@200&family=Jost:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once("../partials/header.php"); ?>

    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="#">Orders Beheren</a></li>
            <!-- More options can be added here -->
        </ul>
    </aside>

    <div class="content">
        <h1>Medewerker Dashboard</h1>
        <p>Welkom, <?php echo htmlspecialchars($_SESSION['gebruikersnaam']); ?>!</p>
        <!-- Content of the employee dashboard goes here -->
    </div>

    <?php require_once("../partials/footer.php"); ?>
</body>

</html>