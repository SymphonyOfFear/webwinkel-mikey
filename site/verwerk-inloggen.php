<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['wachtwoord'])) {
        if (!empty($_POST['email']) && !empty($_POST['wachtwoord'])) {
            $emailForm = $_POST['email'];
            $wachtwoordForm = $_POST['wachtwoord'];

            try {
                $stmt = $conn->prepare("SELECT * FROM Gebruikers WHERE email=:email");
                $stmt->bindParam(':email', $emailForm);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $dbuser = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (password_verify($wachtwoordForm, $dbuser['wachtwoord'])) {
                        $_SESSION['user_id'] = $dbuser['id'];
                        $_SESSION['email'] = $dbuser['email'];
                        $_SESSION['gebruikersnaam'] = $dbuser['gebruikersnaam'];
                        $_SESSION['rol'] = $dbuser['rol'];

                        switch ($dbuser['rol']) {
                            case 'admin':
                                header("Location: admin-dashboard.php"); // Na het instellen van andere sessievariabelen
                                $_SESSION['isIngelogd'] = true;
                                exit;
                            case 'medewerker':
                                $_SESSION['isIngelogd'] = true;
                                header("Location: dashboard.php");
                                exit;
                            case 'klant':
                                $_SESSION['isIngelogd'] = true;
                                header("Location: index.php");
                                exit;
                        }
                    } else {
                        $_SESSION['message'] = 'Het opgegeven wachtwoord is onjuist.';
                    }
                } else {
                    $_SESSION['message'] = 'Geen gebruiker gevonden met het opgegeven e-mailadres.';
                }
            } catch (PDOException $e) {
                $_SESSION['message'] = 'Er is een fout opgetreden bij het uitvoeren van de databasequery.';
                // Optioneel: log de fout naar een bestand voor verdere analyse
                error_log("Databasefout: " . $e->getMessage(), 0);
            }
        } else {
            $_SESSION['message'] = 'E-mailadres en wachtwoord zijn verplichte velden.';
        }
    }
}

header("Location: login.php");
exit;
