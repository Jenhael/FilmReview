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
            <p id="soustitre">Ajoutez ou modifiez des films ici.</p>
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
    <section class="blocform">
        <h2 class="h2us">Résultat de l'Ajout</a></h2>
         <div class="form formcontact">

<?php

session_start();



//A replacer par la récupération des données depuis le formulaire avec htmlspecialchars()
$GLOBALS["titre"] = $_POST["titre"];
$GLOBALS["duree"] = $_POST["duree"];
$GLOBALS["realisateur"] = $_POST["realisateur"];
$GLOBALS["acteurs"] = $_POST["acteurs"];
$GLOBALS["annee"] = $_POST["annee"];
$GLOBALS["theme"] = $_POST["theme"];
$GLOBALS["synopsis"] = $_POST["synopsis"];
$GLOBALS["url"] = $_POST["url"];
$GLOBALS["imageurl"] = $_POST["imageurl"];
$GLOBALS["age_requis"] = $_POST["age_requis"];


$servername = "localhost";
$username = "root";
$password = "";
$database = "cube3";
$GLOBALS["db"] = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", "$username", "$password");

//    const_dump($GLOBALS["db"]);

/**********************/
/* CONNEXION A LA BDD */                               
/**********************/
try{
    $db = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", "$username", "$password");

}catch (Exception $e){ //Si une erreur se produit durant la requête
    echo 'Erreur de connexion à la db'; //Ne pas afficher l'erreur mais un message (car elle contient le mot de passe)
}

                                                    // FONCTIONS Realisateur

/*
function AjouterRealisateur($realisateur){
    // $servername = "localhost";$username = "root";$password = "";$database = "cube3";
    // $sql = "INSERT INTO realisateurs (nom) VALUES ($GLOBALS['realisateur'])";
    // return $GLOBALS["db"]->query($sql);


    $sql = "INSERT INTO realisateurs (nom) VALUES (:realisateur)";  
        
    $statement = $GLOBALS["db"]->prepare($sql); 

    $statement->bindValue(':realisateur', $realisateur, PDO::PARAM_STR);

    $statement->execute();
    
    $lignes = $statement->fetch(); //fetchAll si il y a plusieurs lignes de résultats
    //NOTE : Dans le cas ou plusieurs lignes serait récupérées, il faudra utiliser une boucle foreach pour récupérer chaque ligne
    
    
    // var_dump($lignes);
    return "ok";

}

function ChercherRealisateur($realisateur){

        $sql = "SELECT id_realisateurs FROM realisateurs WHERE nom = :realisateur";  
        
        $statement = $GLOBALS["db"]->prepare($sql); 
    
        $statement->bindValue(':realisateur', $GLOBALS["realisateur"], PDO::PARAM_STR);
    
        $statement->execute();
        
        $lignes = $statement->fetch(); //fetchAll si il y a plusieurs lignes de résultats
        //NOTE : Dans le cas ou plusieurs lignes serait récupérées, il faudra utiliser une boucle foreach pour récupérer chaque ligne
        
        
        // var_dump($lignes);

        //TODO : Si le tableau est vide car réalisateur non trouvé, ne pas renvoyer $lignes, mais du texte
        if(empty($lignes)){
            return "id non trouvé";
        }else{
            return $lignes['id_realisateurs'];  
        }
}

// var_dump(ChercherRealisateur($realisateur_form));

if(is_numeric(ChercherRealisateur($GLOBALS["realisateur"]))){
    $real = "réalisateur existant". "<br> <br>";
}else{
    
    AjouterRealisateur($GLOBALS["realisateur"]);
    ChercherRealisateur($GLOBALS["realisateur"]);
$real = "réalisateur ajouté : ". $GLOBALS["realisateur"]."<br>" . "id realisateur : " . ChercherRealisateur($GLOBALS["realisateur"]) . "<br> <br>";
  
}
echo $real;  





                                                    // FONCTIONS ACTEURS





function ChercherActeur($acteurs) {

    $sql = "SELECT id_acteurs FROM acteurs WHERE nom = :acteurs";  
        
    $statement = $GLOBALS["db"]->prepare($sql); 

    $statement->bindValue(':acteurs', $GLOBALS["acteurs"], PDO::PARAM_STR);

    $statement->execute();
    
    $lignes = $statement->fetch(); 
    
    if(empty($lignes)){
        return "id non trouvé";
        echo "id non trouvé";
    }else{
           return $lignes['id_acteurs'];
           
    }
    echo ($lignes);

}
ChercherActeur($acteurs);


function AjouterActeur($acteur){

    $sql = "INSERT INTO acteurs (nom) VALUES (:acteurs)";  
        
    $statement = $GLOBALS["db"]->prepare($sql); 

    $statement->bindValue(':acteurs', $GLOBALS["acteurs"], PDO::PARAM_STR);

    $statement->execute();
    
    $lignes = $statement->fetch(); 

}    

if(is_numeric(ChercherActeur($GLOBALS["acteurs"]))){
        $act = "acteur existant". "<br> <br>";
    }else{
        
        AjouterActeur($GLOBALS["acteurs"]);
        ChercherActeur($GLOBALS["acteurs"]);
    $act = " acteurs ajouté : ". $GLOBALS["acteurs"]."<br>" . "id acteurs : " . ChercherActeur($GLOBALS["acteurs"]) . "<br> <br>";
      
    }
    echo $act; 

*/
 
  





      





                                                                        // FONCTIONS THEMES





function ChercherTheme($theme){

    $sql = "SELECT id_themes FROM themes WHERE nom = :theme";  
        
    $statement = $GLOBALS["db"]->prepare($sql); 

    $statement->bindValue(':theme', $GLOBALS["theme"], PDO::PARAM_STR);

    $statement->execute();
    
    $lignes = $statement->fetch();  
    
    if(empty($lignes)){
        return "id non trouvé";
        echo "id non trouvé";
    }else{
           return $lignes['id_themes'];
           
    }
    echo ($lignes);

}



function AjouterTheme($theme){

    $sql = "INSERT INTO themes (nom) VALUES (:theme)";  
        
    $statement = $GLOBALS["db"]->prepare($sql); 

    $statement->bindValue(':theme', $GLOBALS["theme"], PDO::PARAM_STR);

    $statement->execute();
    
    $lignes = $statement->fetch(); 
}



if(is_numeric(ChercherTheme($GLOBALS["theme"]))){
    $themes = "thême existant";
}else{
    AjouterTheme($GLOBALS["theme"]);
    ChercherTheme($GLOBALS["theme"]);
$themes = "thêmes ajoutés : ". $GLOBALS["theme"]."<br>" . "id theme : " . ChercherTheme($GLOBALS["theme"]);
}

echo $themes;



                                                                        // FONCTIONS FILMS                      

function AjouterFilm($db) {
    $id_theme = ChercherTheme($GLOBALS["theme"]);

    $sqlCheck = "SELECT id_films FROM films WHERE titre = :titre AND annee = :annee AND realisateurs = :realisateurs AND acteurs = :acteurs AND id_themes = :id_themes";
    $stmtCheck = $db->prepare($sqlCheck);
    $stmtCheck->bindValue(':titre', $GLOBALS["titre"], PDO::PARAM_STR);
    $stmtCheck->bindValue(':annee', $GLOBALS["annee"], PDO::PARAM_INT);
    $stmtCheck->bindValue(':realisateurs', $GLOBALS["realisateur"], PDO::PARAM_STR);
    $stmtCheck->bindValue(':acteurs', $GLOBALS["acteurs"], PDO::PARAM_STR);
    $stmtCheck->bindValue(':id_themes', $id_theme, PDO::PARAM_INT);
    $stmtCheck->execute();

    if ($stmtCheck->rowCount() > 0) {
        echo "<br>Le film existe déjà dans la base de données.";
    } elseif ($id_theme !== null) {
        $sql = "INSERT INTO films (titre, duree, annee, synopsis, url, imageurl, age_requis, realisateurs, acteurs, id_themes) 
                VALUES (:titre, :duree, :annee, :synopsis, :url, :imageurl, :age_requis, :realisateurs, :acteurs, :id_themes)";

        $statement = $db->prepare($sql);
        $statement->bindValue(':titre', $GLOBALS["titre"], PDO::PARAM_STR);
        $statement->bindValue(':duree', $GLOBALS["duree"], PDO::PARAM_STR);
        $statement->bindValue(':annee', $GLOBALS["annee"], PDO::PARAM_INT);
        $statement->bindValue(':synopsis', $GLOBALS["synopsis"], PDO::PARAM_STR);
        $statement->bindValue(':url', $GLOBALS["url"], PDO::PARAM_STR);
        $statement->bindValue(':imageurl', $GLOBALS["imageurl"], PDO::PARAM_STR);
        $statement->bindValue(':age_requis', $GLOBALS["age_requis"], PDO::PARAM_STR);
        $statement->bindValue(':realisateurs', $GLOBALS["realisateur"], PDO::PARAM_STR);
        $statement->bindValue(':acteurs', $GLOBALS["acteurs"], PDO::PARAM_STR);
        $statement->bindValue(':id_themes', $id_theme, PDO::PARAM_INT);

        try {
            $statement->execute();
            echo "<br>" . "Film ajouté avec succès";
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du film : " . $e->getMessage();
        }
    } else {
        echo "Erreur : Certains IDs ne sont pas disponibles.";
    }
}


// Assurez-vous d'avoir appelé vos fonctions ChercherRealisateur, ChercherActeur et ChercherTheme avant d'appeler AjouterFilm
// ...
// Appel de la fonction AjouterFilm avec la connexion à la base de données
AjouterFilm($GLOBALS["db"]);



        

/* if ($_SERVER["REQUEST_METHOD"] == "POST") { //TODO: htmlspecialchars($_post["champ])
    $GLOBALS["titre"] = $_POST["titre"];
    $GLOBALS["duree"] = $_POST["duree"];
    $GLOBALS["realisateur"] = $_POST["realisateur"];
    $GLOBALS["acteurs"] = $_POST["acteurs"];
    $GLOBALS["annee"] = $_POST["annee"];
    $GLOBALS["theme"] = $_POST["theme"];
    $GLOBALS["synopsis"] = $_POST["synopsis"];
    $GLOBALS["url"] = $_POST["url"];
}
    $id_realisateur = Realisateur($realisateur);
    $id_acteur = Acteur($acteurs);
    $id_theme = Theme($theme);

    // const_dump($id_realisateur);

    Realisateur($realisateur);
    Acteur($acteurs); 
    Theme($theme);
    AjouterFilm();


    // Validez les données du formulaire ici si nécessaire...  */
?>
      <button class="submitcontact espace"><a href="panel_admin.php">Retour</a></button>
</div>
</section>

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