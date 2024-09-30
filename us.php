<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos - Vidéothèque XYZ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css"> <!-- Ajoutez un fichier CSS personnalisé si nécessaire -->
</head>
<body>
    <header>
        <div id="titrediv">
            <h1>À Propos de Nous</h1>
            <p id="soustitre">Découvrez notre vidéothèque et notre passion pour le cinéma et les séries.</p>
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

    <main id="mainT">
        <section class="blocform">
            <h2 class="h2us">Qui Sommes-Nous ?</h2>
            <div class="form formcontact">
            <p class="pus">Nous sommes une vidéothèque passionnée par le cinéma et les séries. Notre mission est de vous offrir un accès facile à une vaste collection de films et de séries pour votre divertissement.</p>
            </div>
        </section>

        <section class="blocform">
            <h2 class="h2us">Notre Équipe</h2>
            <div class="form formcontact">
            <p class="pus">Nous sommes une équipe dédiée de cinéphiles et de mordus de séries. Chacun d'entre nous est passionné par l'art du film et de la télévision, et nous travaillons dur pour vous apporter la meilleure expérience de vidéothèque possible.</p>
            </div>
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