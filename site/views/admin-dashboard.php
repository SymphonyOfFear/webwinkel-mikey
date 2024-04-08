<?php
session_start();
require_once '../app/config/database.php';

// Database and session-related PHP code...

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include Tailwind CSS directly for now -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-background text-foreground flex flex-col min-h-screen">

    <?php include_once("../partials/header.php"); ?>

    <div class="flex flex-grow">
        <!-- Sidebar -->
        <aside class="w-64 bg-sidebar-background p-6 fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <!-- Sidebar content -->
        </aside>

        <!-- Content area -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <!-- Main content -->
        </main>
    </div>

    <?php include_once("../partials/footer.php"); ?>

    <!-- Rest of the HTML and PHP code... -->
</body>

</html>