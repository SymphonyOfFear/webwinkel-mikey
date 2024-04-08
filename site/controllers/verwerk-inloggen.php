        <?php
        session_start();
        require_once '../app/config/database.php';

        // Use a more comprehensive check for HTTP method
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405); // Use the built-in function for setting the response code
            include '405.php'; // Ensure this file provides meaningful information about the error
            exit;
        }

        // Initialize variables and perform basic validation
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $wachtwoord = $_POST['wachtwoord'] ?? '';

        if (empty($email) || empty($wachtwoord)) {
            $_SESSION['message'] = 'E-mail en wachtwoord zijn vereist.';
            header("Location: ../views/inloggen.php");
            exit;
        }

        try {
            $sql = "SELECT Gebruikers.*, Rollen.rol_naam 
                    FROM Gebruikers 
                    INNER JOIN Rollen ON Gebruikers.rol_id = Rollen.rol_id 
                    WHERE email = :email LIMIT 1";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($wachtwoord, $user['wachtwoord'])) {
                    $_SESSION['isIngelogd'] = true;
                    $_SESSION['gebruikersnaam'] = $user['gebruikersnaam'];
                    $_SESSION['rol'] = $user['rol_naam'];

                    switch ($user['rol_naam']) {
                        case 'Admin':
                        case 'Eigenaar':
                            header("Location: ../views/admin-dashboard.php");
                            break;
                        case 'medewerker':
                            header("Location: ../views/dashboard.php");
                            break;
                        default:
                            header("Location: ../index.php");
                    }
                    exit;
                }
            }

            // Handle incorrect credentials uniformly to avoid enumeration attacks
            $_SESSION['message'] = 'Ongeldig e-mailadres of wachtwoord.';
            header("Location: ../views/inloggen.php");
            exit;
        } catch (PDOException $e) {
            // Consider logging this error to a file or a logging system
            error_log("Login error: " . $e->getMessage());
            $_SESSION['message'] = 'Er is een probleem opgetreden. Probeer het later opnieuw.';
            header("Location: ../views/inloggen.php");
            exit;
        }
