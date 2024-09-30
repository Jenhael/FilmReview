<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">

</head>
<body>

<header>
        <div id="titrediv">
            <h1>S'inscrire</h1>
            <p id="soustitre">Remplisser le formulaire d'inscription ci dessous</p>
        </div>
        <img id="popcorn" src="image/popcorn.png" alt="">
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
    
    <main>

    <section class="blocform">

    <h2 class="h2us">Inscrivez vous</h2>
    <form action="traitement_inscription.php" method="post">
    <div class="form formcontact">    
        <label for="id">Identifiant :</label>
        <input type="id" id="id" name="id" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="age">Votre age :</label>
        <input type="age" id="age" name="age" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirmez le mot de passe :</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button class="submitcontact" type="submit">S'inscrire</button>
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





