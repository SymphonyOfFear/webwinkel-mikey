<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS Connection -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Webwinkel</title>
</head>

<body class="bg-background font-body text-text-color">
    <header class="bg-navbar-background w-full fixed top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex justify-between h-16">
                <div class="flex">
                    <div class="-ml-2 mr-2 flex items-center md:hidden">
                        <!-- Mobile menu button -->
                    </div>
                    <div class="flex-shrink-0 flex items-center">
                        <a href="../index.php" class="logo">
                            <img src="../assets/images/logo.png" alt="Enigma Interactive Logo" class="h-8 sm:h-10">
                        </a>
                    </div>
                </div>
                <div class="hidden md:ml-6 md:flex md:space-x-8">
                    <a href="../index.php" class="text-gray-300 hover:bg-hover px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="../views/producten.php" class="text-gray-300 hover:bg-hover px-3 py-2 rounded-md text-sm font-medium">Producten</a>
                    <!-- Session-based links for admin and eigenaar roles -->
                    <?php if (isset($_SESSION['rol']) && in_array($_SESSION['rol'], ['Admin', 'Eigenaar'])) : ?>
                        <a href="../views/admin-dashboard.php" class="text-gray-300 hover:bg-hover px-3 py-2 rounded-md text-sm font-medium">Admin Dashboard</a>
                    <?php endif; ?>
                    <!-- Session-based link for medewerker role -->
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Medewerker') : ?>
                        <a href="#" class="text-gray-300 hover:bg-hover px-3 py-2 rounded-md text-sm font-medium">Medewerker Dashboard</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>
    <!-- Rest of the body content -->
</body>

</html>