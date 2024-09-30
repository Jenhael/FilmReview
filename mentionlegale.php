<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions Légales</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div id="titrediv">
            <h1>Mentions Légales</h1>
            <p id="soustitre">Nos mentions légales.</p>
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
        <h2 class="h2us">Informations sur l'éditeur du site :</h2>
        <div class="form formcontact"> 
        <p>Nom de l'entreprise :</p>
        <p>Adresse de l'entreprise :</p>
        <p>Téléphone de l'entreprise :</p>
        <p>Email de l'entreprise :</p>
        </div>
    </section>

    <section class="blocform">
        <h2 class="h2us">Hébergement du site :</h2>
        <div class="form formcontact"> 
        <p>Nom de l'hébergeur :</p>
        <p>Adresse de l'hébergeur :</p>
        <p>Téléphone de l'hébergeur :</p>
        <p>Email de l'hébergeur :</p>
        </div>
    </section>

    <section class="blocform">
        <h2 class="h2us">Protection des données personnelles :</h2>
        <div class="formcontact">
        <p>Liste des informations sur la collecte et le traitement des données personnelles si applicable.</p>
        </div>
    </section>

    <section class="blocform">
        <h2 class="h2us">Propriété intellectuelle :</h2>
        <div class="formcontact">
        <p>Liste des informations sur les droits d'auteur, les marques déposées et la propriété intellectuelle.</p>
        </div>
    </section>

    <section class="blocform">
        <h2 class="h2us">Responsabilité :</h2>
        <div class="formcontact">
        <p>Liste des informations sur la responsabilité de l'éditeur du site.</p>
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