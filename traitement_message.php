<?php
// Connexion à la base de données (à personnaliser avec vos propres informations)
$servername = "localhost";
$username = "root";
$password = "";
$database = "cube3";

$conn = new mysqli($servername, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Validez les données du formulaire ici si nécessaire...

    // Insérez les données dans la table de la base de données
    $sql = "INSERT INTO message (username, email, message) VALUES ('$nom', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été enregistrées avec succès." . " ". $message;
    } else {
        echo "Erreur lors de l'enregistrement des données : " . $conn->error;
    }

    // Fermez la connexion à la base de données
    $conn->close();
}
?>