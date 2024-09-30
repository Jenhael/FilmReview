<?php
session_start();

if (isset($_SESSION['username'])) {
    $id_user = $_SESSION['id_user'];
}

try {
    $bdd = new PDO("mysql:host=localhost;dbname=cube3", "root", "");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['recherche'])) {
    $recherche = '%' . $_POST['recherche'] . "%";
    $rechercheVal = $_POST['recherche'];
}

$requeteAgeUtilisateur = $bdd->prepare("SELECT age FROM user WHERE id_user = :id_user");
$requeteAgeUtilisateur->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$requeteAgeUtilisateur->execute();
$ageUtilisateur = $requeteAgeUtilisateur->fetchColumn();

$requeteR = $bdd->prepare("SELECT * FROM films
    WHERE titre LIKE :recherche
    AND (:ageUtilisateur >= 12 OR age_requis = 'Tous public')
    ORDER BY id_films DESC");

$requeteR->bindParam(':recherche', $recherche, PDO::PARAM_STR);
$requeteR->bindParam(':ageUtilisateur', $ageUtilisateur, PDO::PARAM_INT);
$requeteR->execute();

$requeteFav = $bdd->prepare("SELECT * FROM films
    INNER JOIN film_favori ON films.id_films = film_favori.id_films
    WHERE film_favori.id_user = :id_user
    ORDER BY films.id_films DESC
    LIMIT 20");

$requeteFav->bindParam(':id_user', $id_user, PDO::PARAM_INT);

if (!$requeteFav->execute()) {
    die('Erreur d\'exécution de la requête : ' . $requeteFav->errorInfo()[2]);
}

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

function filmEstDansWatchlist($id_films)
{
    global $bdd;
    $id_user = $_SESSION['id_user'];

    try {
        $stmt = $bdd->prepare("SELECT COUNT(*) FROM watchlist WHERE id_user = :id_user AND id_films = :id_films");
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
    <link rel="stylesheet" href="styles.css"> <!-- Ajoutez un fichier CSS personnalisé si nécessaire -->
</head>
<body>
    <header>
        <div id="titrediv">
            <h1>Bienvenue à la Vidéothèque XYZ</h1>
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

    <main id="mainR">
        <div id="div">
            <div id="barreRecherche">
                <form action="recherche.php" method="post">
                    <input type="text" placeholder="Chercher un film" name="recherche">
                    <button type="submit">&#x1F50D;</button>
                </form>
            </div>
            <h2>Les films correspondant à votre recherche: <?php echo "$rechercheVal"?></h2>
            <section>
                <div id="divR">
                    <?php 
                    $count = 0;
                    while ($film = $requeteR->fetch(PDO::FETCH_ASSOC)) { 
                        if ($count % 5 == 0) {
                            echo '<div class="film-row">';
                        }
                    ?>
                    <a href="categorie.php">
                    <li class="bloc">
                        <img class="affiche" src="<?php echo $film['imageurl']; ?>" width="200" height="300" >
                        <nav>
                            <form action="addToList.php" method="post">
                                <input type="hidden" name="id_films" value="<?php echo $film['id_films']; ?>">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    $isInWatchlist = filmEstDansWatchlist($film['id_films']);
                                ?>
                                <?php if ($isInWatchlist) { ?>
                                    <!-- Si le film est dans la watchlist, affichez le bouton "-" avec le CSS de .remove-button -->
                                    <button type="submit" name="addToWatchlist" class="add-button">-</button>
                                <?php } else { ?>
                                    <!-- Sinon, affichez le bouton "+" avec le CSS de .add-button -->
                                    <button type="submit" name="addToWatchlist" class="add-button">+</button>
                                <?php } ?>
                                <!-- Ajoutez la classe "etoile-remplie" si le film est dans les favoris -->
                                <button type="submit" name="addToFav" class="etoile <?php echo filmEstDansFavoris($film['id_films']) ? 'etoile-remplie' : ''; ?>">
                                    &#9733; <!-- ceci est une étoile -->
                                </button>
                                <?php } ?>
                            </form>
                            <?php    
                            $requete_theme = $bdd->query(
                                "SELECT themes.nom FROM films
                                INNER JOIN themes ON films.id_themes = themes.id_themes 
                                WHERE films.id_films = " . $film['id_films']);
                            $resultat_theme = $requete_theme->fetch();
                            $nom_theme = '';
                            if ($resultat_theme) {
                                $nom_theme = htmlspecialchars($resultat_theme['nom']);
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
                    <?php
                    $count++;
                    if ($count % 5 == 0) {
                        echo '</div>';
                    }
                }
                // Si le nombre total de films n'est pas un multiple de 5, fermer la dernière ligne.
                if ($count % 5 != 0) {
                    echo '</div>';
                }
                ?>
                </div>
            </section>
        </div>
    </main>

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
        </div>
    </div>

    <footer id=footcat>
        <nav id="navfoot">
            <ul id="ulfoot">
                <li class="lifoot"><a href="mentionlegale.php">Mentions légales</a></li>
                <li class="lifoot"><a href="cgu.php">Conditions générales d'utilisation</a></li>
                <li class="lifoot"><a href="rgpd.php">Règlement général sur la protection des données</a></li>
            </ul>
        </nav>
    </footer>
    <script src="modal.js"></script>
</body>
</html>