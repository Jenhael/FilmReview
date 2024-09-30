<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Conditions Générales d'Utilisation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div id="titrediv">
            <h1>Conditions Générales d'Utilisation</h1>
            <p id="soustitre">Nos Conditions générales d'utilisation.</p>
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
        <h2 class="h2us">1. Introduction</h2>
        <div class="form formcontact">
        <p>Les présentes Conditions Générales d'Utilisation (ci-après dénommées "CGU") régissent l'utilisation du site web [votre site web] (ci-après dénommé le "Site") et de tous les services associés.</p>
        </div>
    </section>
    
    <section class="blocform">
        <h2 class="h2us">2. Acceptation des CGU</h2>
        <div class="form formcontact">
        <p>En utilisant le Site, vous acceptez pleinement et sans réserve les présentes CGU. Si vous n'acceptez pas ces CGU, veuillez ne pas utiliser le Site.</p>
        </div>
    </section>
    
    <section class="blocform">
        <h2 class="h2us">3. Utilisation du Site</h2>
        <div class="form formcontact">
        <p>Vous vous engagez à utiliser le Site conformément aux lois applicables et aux présentes CGU. Vous ne devez pas utiliser le Site de manière abusive, illégale, ou pour des activités frauduleuses.</p>
        </div>
    </section>
    
    <!-- Ajoutez d'autres sections pour détailler davantage vos CGU -->

    <section class="blocform">
        <h2 class="h2us">4. Modification des CGU</h2>
        <div class="form formcontact">
        <p>Nous nous réservons le droit de modifier ces CGU à tout moment. Les modifications seront effectives dès leur publication sur le Site. Il est de votre responsabilité de consulter régulièrement les CGU pour rester informé des éventuelles modifications.</p>
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