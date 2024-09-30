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
            <h1>Panneau d'administration</h1>
            <p id="soustitre">Ajouter ou supprimer des films ici.</p>
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
    
<main>
<div id="Gdivformmovie">
            <div class="Pdivformmovie">
                <h2 class="h2us">Ajouter un film à votre vidéothèque</h2>
    
                <form class="form formmovie" action="AddMovie.php" method="post">
                    <label for="titre">Titre du film:</label>
                    <input class="inputfm" type="text" id="titre" name="titre" required><br>
    
                    <label for="realisateur">Réalisateur:</label>
                    <input class="inputfm" type="text" id="realisateur" name="realisateur"><br>

                    <label for="acteurs">Acteurs:</label>
                    <input class="inputfm" type="text" id="acteurs" name="acteurs"><br>

                    <label for="duree">Durée du Film:</label>
                    <input class="inputfm" type="text" id="duree" name="duree"><br>
    
                    <label for="annee">Année de sortie:</label>
                    <input class="inputfm" type="text" id="annee" name="annee"><br>
    
                    <label for="theme">Genre:</label>
                    <input class="inputfm" type="text" id="theme" name="theme"><br>

                    <label for="age_requis">Classification:</label>
                    <input class="inputfm" type="text" id="age_requis" name="age_requis"><br>
    
                    <label for="synopsis">Synopsis:</label><br>
                    <textarea id="synopsis" name="synopsis" rows="4" cols="50"></textarea><br>
    
                    <label for="url">Lien de votre film:</label><br>
                    <input type="url" class="inputfm" id="url" name="url"><br>

                    <label for="imageurl">Lien de l'affiche du film:</label><br>
                    <input type=text class="inputfm" id="imageurl" name="imageurl"><br>
    
                    <button class="inputfm submitmovie" type="submit" value="Ajouter le film"> Ajouter le film</button>
                </form>
            </div>          

            <div class="Pdivformmovie form_suppr">
        <h2 class="h2us">Supprimer un film dans votre vidéothèque</h2>

         <form class="form formmovie" action="deleteMovie.php" method="post">
           <label for="nom_film">Nom du film:</label>
           <input class="inputfm" type="text" id="nom_film" name="nom_film" required><br>

           <button type="submit" class="inputfm submitmovie" name="delete_movie" value="Supprimer le film">Supprimer le film</button>
        </form>
</div>
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