<?php
session_start(); // Démarrez la session

// Détruisez la session
session_destroy();

// Redirigez l'utilisateur vers la page du compte
header('Location: account.php');
exit();
?>
