<?php
session_start();

// Si l'utilisateur n'est pas connecté, redirigez-le vers login.php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

try {
    $bdd = new PDO("mysql:host=localhost;dbname=cube3", "root", "");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$id_user = $_SESSION['id_user'];

// Ajoutez cette requête pour obtenir l'âge de l'utilisateur
$sqlSelectAge = "SELECT age FROM user WHERE id_user = :id_user";
$stmtSelectAge = $bdd->prepare($sqlSelectAge);
$stmtSelectAge->bindValue(':id_user', $id_user, PDO::PARAM_INT);
$stmtSelectAge->execute();

// Récupérez l'âge de l'utilisateur
$ageUtilisateur = $stmtSelectAge->fetchColumn();

$requeteWatchlist = $bdd->prepare("SELECT films.* FROM films
INNER JOIN watchlist ON films.id_films = watchlist.id_films
WHERE watchlist.id_user = :id_user
AND (films.age_requis = 'Tous public' OR :ageUtilisateur >= 12)  
ORDER BY films.id_films DESC
LIMIT 20");
$requeteWatchlist->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$requeteWatchlist->bindParam(':ageUtilisateur', $ageUtilisateur, PDO::PARAM_INT);

if (!$requeteWatchlist->execute()) {
    die('Erreur d\'exécution de la requête : ' . $requeteWatchlist->errorInfo()[2]);
}

// Ajoutez une requête SQL pour sélectionner les informations de l'utilisateur
$sqlSelectUser = "SELECT username, email, age FROM user WHERE id_user = :id_user";
$stmtSelectUser = $bdd->prepare($sqlSelectUser);
$stmtSelectUser->bindValue(':id_user', $id_user, PDO::PARAM_INT);
$stmtSelectUser->execute();

$userInfo = $stmtSelectUser->fetch(PDO::FETCH_ASSOC);

function filmEstDansFavoris($id_films)
{
    global $bdd;
    $id_user = $_SESSION['id_user'];

    try {
        $stmt = $bdd->prepare("SELECT COUNT(*) FROM film_favori WHERE id_user = :id_user AND id_films = :id_films");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_films', $id_films);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidéothèque XYZ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'utiliser le bon fichier CSS -->
</head>

<body>
    <header>
        <div id="titrediv">
            <h1>Mon compte</h1>
            <p id="soustitre">Bienvenue dans votre espace.</p>
        </div>
        <img id="popcorn" src="image/popcorn.png" alt="">
        <p class="welcome-message"> Vous êtes connecté sur <?php echo $_SESSION['username']; ?> </p>
    </header>

    <nav id="navhead">
        <ul id="menu">
            <a class="lihead" href="home.php">
                <li>Accueil</li>
            </a>
            <a class="lihead" href="categorie.php">
                <li>Films</li>
            </a>
            <a class="lihead" href="us.php">
                <li>À propos</li>
            </a>
            <a class="lihead" href="contact.php">
                <li>Contact</li>
            </a>
            <?php
            if (!isset($_SESSION['username'])) {
                // L'utilisateur n'est pas connecté, affichez "Se connecter"
                echo '<a class="lihead" href="login.php"><li>Se connecter</li></a>';
            } else {
                // L'utilisateur est connecté, affichez "Mon Compte"
                echo '<a class="lihead" href="account.php"><li>Mon Compte</li></a>';
            }
            ?>
        </ul>
    </nav>

    <main id="mainT">
        <div class="divCompte">
            <div id="divProfil">
            <h2 class="h2us">Mes infos :</h2>
                <p> Mon nom d'utilisateur est
                    <?php echo isset($userInfo['username']) ? $userInfo['username'] : 'non défini'; ?>
                     .
                </p>
                <p>Mon adresse email est
                    <?php echo isset($userInfo['email']) ? $userInfo['email'] : 'non défini'; ?>
                     .
                </p>
                <p>Mon âge est de 
                    <?php echo isset($userInfo['age']) ? $userInfo['age'] : 'non défini'; ?>
                    ans .
                </p>
                <div class="divformdeco">
                    <form class="transparent" action="formModifCompte.php" method="post">
                        <button class="submitcontact" id="modifInfo" type="submit">Modifier mes infos</button>
                    </form>
                </div>
            </div>

            <div id="divMesFilms">
            <h2 class="h2us">Votre Watchlist :</h2>
                <?php if ($requeteWatchlist->rowCount() > 0) { ?>
                    <ul class="filmlist">
                        <?php while ($film = $requeteWatchlist->fetch(PDO::FETCH_ASSOC)) { ?>
                            <li class="bloc">
                                <img class="affiche" src="<?php echo $film['imageurl']; ?>">
                                <nav>
                                    <form action="addToList.php" method="post">
                                        <input type="hidden" name="id_films" value="<?php echo $film['id_films']; ?>">
                                        <button type="submit" name="addToWatchlist" class="add-button">-</button>
                                        <button type="submit" name="addToFav"
                                                class="etoile <?php echo filmEstDansFavoris($film['id_films']) ? 'etoile-remplie' : ''; ?>">
                                            &#9733; <!-- ceci est une étoile -->
                                        </button>
                                    </form>
                                    <?php
                            // recup nom real
        $requete_theme = $bdd->query(
            "SELECT themes.nom FROM films
            INNER JOIN themes ON films.id_themes = themes.id_themes 
            WHERE films.id_films = " . $film['id_films']);
        $resultat_theme = $requete_theme->fetch();
        $nom_theme='';
        if ($resultat_theme) {
            $nom_theme= htmlspecialchars($resultat_theme['nom']);
        };

        ?>
                            <button class="voir-details"
                                    data-titre="<?php echo htmlspecialchars($film['titre']); ?>"
                                    data-realisateur="<?php echo htmlspecialchars($film['realisateurs']); ?>"
                                    data-acteurs="<?php echo htmlspecialchars($film['acteurs']);?>"
                                    data-annee="<?php echo htmlspecialchars($film['annee']); ?>"
                                    data-duree="<?php echo htmlspecialchars($film['duree']); ?>"
                                    data-theme="<?php echo $nom_theme?>"
                                    data-age_requis="<?php echo htmlspecialchars($film['age_requis']); ?>"
                                    data-synopsis="<?php echo htmlspecialchars($film['synopsis']); ?>"
                                    data-url="<?php echo htmlspecialchars($film['url']); ?>">Voir les détails</button>
                                </nav>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <h2>Vous n'avez aucun film dans votre watchlist.</h2>
                <?php } ?>
            </div>
        </div>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">
                    <div class="cross-line"></div>
                    <div class="cross-line"></div>
                </span>
                <h2><div id="titre"></div></h2>
                <br>
                <p><div id="realisateur"></div></p>
                <br>
                <p><div id="acteurs"></div></p>
                <br>
                <p><div id="annee"></div></p>
                <br>
                <p><div id="duree"></div></p>
                <br>
                <p><div id="theme"></div></p>
                <br>
                <p><div id="age_requis"></div></p>
                <br>
                <p><div id="synopsis"></div></p>
                <br>
                <div class="espace">
                    <button id="urlFilm" data-url="URL_DU_FILM">Bande annonce</button>
                </div>
                <br>
                <div class="rating"> 
                    <a href="#5" title="Donner 5 étoiles">☆</a>
                    <a href="#4" title="Donner 4 étoiles">☆</a>
                    <a href="#3" title="Donner 3 étoiles">☆</a>       
                    <a href="#2" title="Donner 2 étoiles">☆</a>
                    <a href="#1" title="Donner 1 étoile">☆</a>
                </div>
                <br>
                <!-- Ajoutez d'autres informations de film ici -->
            </div>
        </div>

        <nav id="menucompte">
            <ul id="ulcompte">
                <button id="btnMesFilms" class="buttonCompte">
                    <li class="licompte">Mes films</li>
                </button>
                <button id="btnMonProfil" class="buttonCompte">
                    <li class="licompte">Mon profil</li>
                </button>
                <?php
                // Vérifiez le rôle de l'utilisateur
                if ($_SESSION['role'] === 'admin') {
                    // Si l'utilisateur a le rôle d'administrateur, affichez le bouton du panneau d'administration
                    echo '<li class="licompte"><a href="panel_admin.php">Panneau d\'administration</a></li>';
                }
                ?>
            </ul>
        </nav>
        <h2 class="h2us">Déconnexion</h2>
        <div class="divformdeco">
            <form class="transparent" action="logout.php" method="post">
                <button class="submitcontact" type="submit">Déconnexion</button>
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

    <script src="button.js"></script>
    <script src="modal.js"></script>
    <script src="watchlistButton.js"></script>
</body>

</html>
