<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Vidéothèque XYZ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css"> <!-- Ajoutez un fichier CSS personnalisé si nécessaire -->
</head>
<body>
    <header>
        <div id="titrediv">
            <h1>Panneau d'administration</h1>
            <p id="soustitre">Ajoutez ou modifiez des films ici.</p>
        </div>
        <img id="popcorn" src="image/popcorn.png" alt="">
        <?php
        if (!isset($_SESSION['username'])) {
    // L'utilisateur n'est pas connecté, ne pas afficher le message de bienvenue
    } else {
    // L'utilisateur est connecté, afficher le profil connecté
    echo 'Vous êtes connecté sur ' . $_SESSION['username'];
    }
    ?>
    </header>

    <nav id="navhead">
        <ul id="menu">
            <a class="lihead" href="home.php"><li >Accueil</li></a>
            <a class="lihead"href="categorie.php"><li >Films</li></a>
            <a class="lihead"href="us.php"><li >À propos</li></a>
            <a class="lihead"href="contact.php"><li >Contact</li></a>
            <a class="lihead"href="login.php"><li >Mon Compte</li></a>
        </ul>
    </nav>
    <section class="blocform">
        <h2 class="h2us">Résultat de la Suppression</h2>
         <div class="form formcontact">
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "cube3";
$db = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);

// Fonction de suppression de film
function supprimerFilmParNom($db, $nom_film) {
    try {
        // Validation : Vérifiez si le champ du nom de film n'est pas vide
        if (empty($nom_film)) {
            throw new Exception("Le nom du film ne peut pas être vide.");
        }

        // Requête SQL pour vérifier si le film existe
        $check_query = "SELECT titre FROM films WHERE titre = :nom_film";
        $stmt = $db->prepare($check_query);
        $stmt->bindParam(':nom_film', $nom_film, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Le film existe, nous pouvons le supprimer
            $delete_query = "DELETE FROM films WHERE titre = :nom_film";
            $stmt = $db->prepare($delete_query);
            $stmt->bindParam(':nom_film', $nom_film, PDO::PARAM_STR);
            $stmt->execute();

            // La suppression a réussi
            return "Le film \"$nom_film\" a été supprimé avec succès.";
        } else {
            // Le film n'existe pas
            return "Le film \"$nom_film\" n'existe pas dans la base de données.";
        }
    } catch (Exception $e) {
        return "Erreur lors de la suppression du film : " . $e->getMessage();
    }
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_movie'])) {
    // Vérifiez si le champ du nom du film est rempli dans le formulaire
    if (isset($_POST['nom_film'])) {
        $nom_film_a_supprimer = $_POST['nom_film'];
        // Appelez la fonction pour supprimer le film par son nom
        $resultat_suppression = supprimerFilmParNom($db, $nom_film_a_supprimer);
        // Affichez le résultat de la suppression
        echo $resultat_suppression;
    }
}
?>
  <button class="submitcontact espace"><a href="panel_admin.php">Retour</a></button>
 </div>
</section>

<footer>
    <nav id="navfoot">
        <ul id="ulfoot">
            <li class="lifoot"><a href="mentionlegale.php">Mentions légales</a></li>
            <li class="lifoot"><a href="cgu.php">Conditions générales d'utilisations</a></li>
            <li class="lifoot"><a href="rgpd.php">Règlement général sur la protection des données</a></li>
        </ul>
    </nav>
</footer>
</body>
</html>