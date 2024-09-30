<?php
session_start();

// Si l'utilisateur est déjà connecté, redirigez-le vers account.php
if (isset($_SESSION['username'])) {
    header('Location: account.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Connexion</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

  <header>
        <div id="titrediv">
            <h1>Mon compte</h1>
            <p id="soustitre">Connectez vous ici ou inscrivez vous.</p>
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

    <h2 class="h2us">Connexion</h2>
    <form action="process_login.php" method="post">
    <div class="form formcontact">   
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" name="username" required /><br /><br />
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" required /><br /><br />
      <button class="submitcontact">Se connecter</button>
     </div>
    </form>
     <h2 class="h2us">Pas encore inscrit ?</h2>
     <div class="form"> 
      <button class="submitcontact"><a href="register.php">Inscrivez vous ici</a></button>
     </div> 
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
