<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Remplacez les informations de connexion à la base de données
    $db_host = 'localhost'; // Adresse du serveur MySQL
    $db_user = 'root'; // Nom d'utilisateur MySQL
    $db_pass = ''; // Mot de passe MySQL
    $db_name = 'cube3'; // Nom de la base de données

    // Connexion à la base de données
    $db_connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$db_connection) {
        die("Erreur de connexion à la base de données: " . mysqli_connect_error());
    }

    // Requête SQL pour récupérer le hachage du mot de passe
    $query = "SELECT pwd, role, id_user, email, age FROM user WHERE username = '$username'";
    $result = mysqli_query($db_connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['pwd'];
        $role = $row['role'];
        $id_user = $row['id_user'];
        $email = $row['email'];
        $age = $row['age'];

        // Vérifiez le mot de passe haché
        if (password_verify($password, $hashed_password)) {
            // Mot de passe correct, connectez l'utilisateur
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $_SESSION['id_user'] = $id_user;
            $_SESSION['email'] = $email;
            $_SESSION['age'] = $age;

            header('Location: account.php');
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.<a href='login.php'>Réessayer</a>";
        }
    } else {
        echo "Nom d'utilisateur incorrect.<a href='login.php'>Réessayer</a>";
    }

    // Fermer la connexion à la base de données
    mysqli_close($db_connection);
}
?>
