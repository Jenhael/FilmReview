<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique de confidentialité</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css"> <!-- Ajoutez un fichier CSS personnalisé si nécessaire -->
</head>
<body>
    <header>
       <div id="titrediv"> 
        <h1>Politique de confidentialité</h1>
        <p id="soustitre">Découvrez notre collection de films et de séries</p>
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
        <h2 class="h2us">Collecte des données personnelles</h2>
        <div class="form formcontact">
            <p style="text-align: center;">Nous collectons différentes catégories de données personnelles lorsque vous utilisez notre site web :</p>
                <p>Informations d'identification (nom, prénom, adresse email, etc.)</p>
                <p>Données de localisation</p>
                <p>Données de navigation (adresse IP, navigateur, système d'exploitation, etc.)</p>
                <p>Autres données que vous choisissez de partager avec nous</p>
                <p>Nous collectons ces données dans le but de vous fournir nos services, d'améliorer votre expérience utilisateur, et de vous contacter si nécessaire.</p>
        </div>
        </section>

        <section class="blocform">
        <h2 class="h2us">Cookies</h2>
        <div class="form formcontact">
            <p>Notre site web utilise des cookies pour améliorer votre expérience de navigation. Les cookies sont de petits fichiers texte stockés sur votre appareil lorsque vous visitez notre site. Vous pouvez gérer les préférences de cookies dans les paramètres de votre navigateur.</p>
        </div>
        </section>

        <section class="blocform">
        <h2 class="h2us">Utilisation des données</h2>
        <div class="form formcontact">
                <p style="text-align: center;">Nous utilisons les données personnelles collectées pour :</p>
                <p>Fournir et maintenir notre site web</p>
                <p>Personnaliser votre expérience et répondre à vos besoins individuels</p>
                <p>Améliorer notre site web</p>
                <p>Vous contacter par email, téléphone ou courrier</p>
        </div>        
        </section>

        <section class="blocform">
        <h2 class="h2us">Partage des données</h2>
        <div class="form formcontact">
            <p>Nous ne partageons pas vos données personnelles avec des tiers sans votre consentement explicite, sauf si cela est nécessaire pour fournir nos services ou répondre à des obligations légales.</p>
        </div>
        </section>

        <section class="blocform">
        <h2 class="h2us">Vos droits</h2>
        <div class="form formcontact">    
                <p style="text-align: center;">Vous avez le droit :</p>
                <p>D'accéder à vos données personnelles</p>
                <p>De corriger ou de supprimer vos données personnelles</p>
                <p>De vous opposer au traitement de vos données personnelles</p>
                <p>De retirer votre consentement à tout moment</p>
                <p>Si vous souhaitez exercer l'un de ces droits, veuillez nous contacter à [adresse email de contact].</p>
        </div>
        </section>

        <section class="blocform">
        <h2 class="h2us">Modifications de cette politique</h2>
        <div class="form formcontact"> 
            <p>Nous nous réservons le droit de mettre à jour cette politique de confidentialité à tout moment. Les modifications seront publiées sur cette page.</p>
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
