<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon profil</title>
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
            <?php
        if (!isset($_SESSION['username'])) {
            // L'utilisateur n'est pas connecté, affichez "Se connecter"
            echo '<a class="lihead" href="login.php"><li >Se connecter</li></a>';
        } else {
            // L'utilisateur est connecté, affichez "Mon Compte"
            echo '<a class="lihead" href="account.php"><li >Mon Compte</li></a>';
        }
        ?>
    </ul>
</nav>
    
<main id="main">
    <h2>Entrez vos nouvelles informations</h2>
    <form class="form formmovie width " action="modifier_compte.php" method="POST">
        <label for="nouveauPseudo">Pseudo:</label>
        <input class="inputfm" type="text" id="nouveauPseudo" name="nouveauPseudo" required><br>

        <label for="nouveauEmail">Email :</label>
        <input class="inputfm" type="text" id="nouveauEmail" name="nouveauEmail"><br>

        <label for="ancienMDP">Ancien mot de passe:</label>
        <input class="inputfm" type="password" id="ancienMDP" name="ancienMDP" required><br>

        <label for="nouveauMDP">Nouveau mot de passe:</label>
        <input class="inputfm" type="password" id="nouveauMDP" name="nouveauMDP"><br>

        <label for="nouveauAge">Age:</label>
        <input class="inputfm" type="text" id="nouveauAge" name="nouveauAge"><br>
                        
        <button class="inputfm submitmovie" type="submit">Confirmer</button>
    </form>                     
</main>


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