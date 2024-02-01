<?php 

session_start();

if(!isset($_SESSION['isIngelogd'])){
    header("location: inloggen.php");
    exit;
}

echo "Welkom " . $_SESSION['voornaam'];



