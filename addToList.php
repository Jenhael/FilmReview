<?php
session_start();

try {
    $bdd = new PDO("mysql:host=localhost;dbname=cube3", "root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activez les exceptions PDO
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['addToWatchlist'])) {

    $id_films = $_POST['id_films'];
    $id_user = $_SESSION['id_user'];
    
    try {
        // Vérifiez d'abord si le film n'est pas déjà dans la watchlist de l'utilisateur
        $stmt = $bdd->prepare("SELECT * FROM watchlist WHERE id_user = :id_user AND id_films = :id_films");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_films', $id_films);
        $stmt->execute();
        
        if ($stmt->rowCount() == 0) {
            // Le film n'est pas encore dans la watchlist, alors on l'ajoute
            $stmt = $bdd->prepare("INSERT INTO watchlist (id_user, id_films) VALUES (:id_user, :id_films)");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_films', $id_films);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            $stmt->execute();
        } else {
            // Le film est déjà dans la watchlist, on le retire
            $stmt = $bdd->prepare("DELETE FROM watchlist WHERE id_user = :id_user AND id_films = :id_films");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_films', $id_films);
            $stmt->execute();
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        
        exit();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


if (isset($_POST['addToFav'])) {

    $id_films = $_POST['id_films'];
    $id_user = $_SESSION['id_user'];
    
    try {
        // Vérifiez d'abord si le film n'est pas déjà dans les favoris de l'utilisateur
        $stmt = $bdd->prepare("SELECT * FROM film_favori WHERE id_user = :id_user AND id_films = :id_films");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_films', $id_films);
        $stmt->execute();
        
        if ($stmt->rowCount() == 0) {
            // Le film n'est pas encore dans les favoris alors on l'ajoute
            $stmt = $bdd->prepare("INSERT INTO film_favori (id_user, id_films) VALUES (:id_user, :id_films)");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_films', $id_films);
            $stmt->execute();
        } else {
            // Le film est déjà dans les favoris, on le retire
            $stmt = $bdd->prepare("DELETE FROM film_favori WHERE id_user = :id_user AND id_films = :id_films");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_films', $id_films);
            $stmt->execute();
        }

        // Redirigez l'utilisateur vers la page d'accueil ou une autre page appropriée.
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

?>
