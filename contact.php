<?php
session_start();

?>

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
            <h1>Contactez-nous</h1>
            <p id="soustitre">Vous avez des questions ou des commentaires ? Envoyez-nous un message.</p>
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
        <a class="lihead" href="categorie.php"><li >Films</li></a>
        <a class="lihead" href="us.php"><li >À propos</li></a>
        <a class="lihead" href="contact.php"><li >Contact</li></a>
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
    
<main>
    <section class="blocform">
        <h2 class="h2us">Formulaire de Contact</h2>
        <form class="form formcontact "action="traitement_message.php" method="POST" >
            <div class="form formcontact">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <br>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <br>
                <button class="submitcontact" type="submit">Envoyer</button>
            </div>
        </form>
    </section>
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