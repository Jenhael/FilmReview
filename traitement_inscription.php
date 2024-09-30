<?php
// Connexion à la base de données MySQL
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$mot_de_passe = ""; // Mot de passe MySQL
$base_de_donnees = "cube3"; // Nom de la base de données MySQL

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifiez la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Récupérez les données du formulaire
$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$age = $_POST['age'];

// Vérifiez si les mots de passe correspondent
if ($password !== $confirm_password) {
    echo "Les mots de passe ne correspondent pas.";
} else {
    // Vérifiez si le nom d'utilisateur est déjà pris
    $sql_check_username = "SELECT * FROM user WHERE username = ?";
    $stmt_check_username = $connexion->prepare($sql_check_username);
    $stmt_check_username->bind_param("s", $id);
    $stmt_check_username->execute();
    $result_username = $stmt_check_username->get_result();

    // Vérifiez si l'e-mail est déjà pris
    $sql_check_email = "SELECT * FROM user WHERE email = ?";
    $stmt_check_email = $connexion->prepare($sql_check_email);
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $result_email = $stmt_check_email->get_result();

    // Vérifiez si le nom d'utilisateur ou l'e-mail est déjà utilisé
    if ($result_username->num_rows > 0) {
        echo "Ce nom d'utilisateur est déjà utilisé.";
    } elseif ($result_email->num_rows > 0) {
        echo "Cette adresse e-mail est déjà utilisée.";
    } else {
        // Les données sont uniques, vous pouvez insérer les données dans la base de données ici
        
        // Assurez-vous de sécuriser le mot de passe avant de l'insérer dans la base de données, par exemple avec password_hash
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);

        // Préparez et exécutez la requête SQL pour insérer les données dans la table
        $sql = "INSERT INTO user (username, email, pwd, age) VALUES (?, ?, ?, ?)";
        $stmt = $connexion->prepare($sql);
        $stmt->bind_param("sssi", $id, $email, $password_hashed, $age);

        if ($stmt->execute()) {
            echo ("Bienvenue, " . $id . " !");
            header("Refresh: 2; URL=login.php"); // Redirection vers login.php après 2 secondes
            exit;
        } else {
            echo "Erreur lors de l'inscription : " . $stmt->error;
        }

        // Fermez la connexion à la base de données
        $stmt->close();
    }
}

$connexion->close();
?>

