<?php


// Checken login gebruiker
session_start();

if(!isset($_SESSION['isIngelogd'])){
    header("location: inloggen.php");
    exit;
}

//  is de gebruiker wel een admin?

if($_SESSION['role'] != "admin")
{
    header("location: index.php");
    exit;
}
