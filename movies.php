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

function SupprimerFilmParNom($nom_film) {
    try {
        // Requête SQL pour vérifier si le film existe
        $check_query = "SELECT titre FROM films WHERE titre = :nom_film";

        $stmt = $GLOBALS["db"]->prepare($check_query);
        $stmt->bindParam(':nom_film', $nom_film, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Le film existe, nous pouvons le supprimer
            $delete_query = "DELETE FROM films WHERE titre = :nom_film";

            $stmt = $GLOBALS["db"]->prepare($delete_query);
            $stmt->bindParam(':nom_film', $nom_film, PDO::PARAM_STR);
            $stmt->execute();

            // La suppression a réussi
            return "Le film \"$nom_film\" a été supprimé avec succès.";
        } else {
            // Le film n'existe pas
            return "Le film \"$nom_film\" n'existe pas dans la base de données.";
        }
    } catch (PDOException $e) {
        return "Erreur lors de la suppression du film \"$nom_film\" : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données
    mysqli_close($db_connection);
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_movie'])) {
    // Vérifiez si le champ du nom du film est rempli dans le formulaire
    if (isset($_POST['nom_film'])) {
        $nom_film_a_supprimer = $_POST['nom_film'];
        // Appelez la fonction pour supprimer le film par son nom
        $resultat_suppression = SupprimerFilmParNom($nom_film_a_supprimer);
        // Affichez le résultat de la suppression
        echo $resultat_suppression;
    }
}



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
    $themes = "theme existant";
}else{
    AjouterTheme($GLOBALS["theme"]);
    ChercherTheme($GLOBALS["theme"]);
$themes = "themes ajoutés : ". $GLOBALS["theme"]."<br>" . "id theme : " . ChercherTheme($GLOBALS["theme"]);
}

echo $themes;



                                                                        // FONCTIONS FILMS                      

function AjouterFilm($db) {
    // Vérifiez d'abord que les IDs des réalisateurs, acteurs et thèmes sont disponibles
    $id_realisateur = ChercherRealisateur($GLOBALS["realisateur"]);
    $id_acteurs = ChercherActeur($GLOBALS["acteurs"]);
    $id_theme = ChercherTheme($GLOBALS["theme"]);

    // Si les IDs sont disponibles, ajoutez le film à la base de données



    $sqlCheck = "SELECT id_films FROM films WHERE titre = :titre AND annee = :annee 
    AND id_realisateur = :id_realisateur AND id_acteurs = :id_acteurs AND id_theme = :id_theme";
$stmtCheck = $db->prepare($sqlCheck);
$stmtCheck->bindValue(':titre', $GLOBALS["titre"], PDO::PARAM_STR);
$stmtCheck->bindValue(':annee', $GLOBALS["annee"], PDO::PARAM_INT);
$stmtCheck->bindValue(':id_realisateur', $id_realisateur, PDO::PARAM_INT);
$stmtCheck->bindValue(':id_acteurs', $id_acteurs, PDO::PARAM_INT);
$stmtCheck->bindValue(':id_theme', $id_theme, PDO::PARAM_INT);
$stmtCheck->execute();
    
    if ($stmtCheck->rowCount() > 0) {
        // Le film existe déjà, vous pouvez décider de ne pas l'ajouter à nouveau ou de gérer l'erreur
        echo "Le film existe déjà dans la base de données.";
    
    } elseif($id_realisateur !== null && $id_acteurs !== null && $id_theme !== null) {
        $sql = "INSERT INTO films (titre, duree, annee, synopsis, url, id_realisateur, id_acteurs, id_theme, imageurl) 
                VALUES (:titre, :duree, :annee, :synopsis, :url, :id_realisateur, :id_acteurs, :id_theme, :imageurl)";
        
        $statement = $db->prepare($sql);
        $statement->bindValue(':titre', $GLOBALS["titre"], PDO::PARAM_STR);
        $statement->bindValue(':duree', $GLOBALS["duree"], PDO::PARAM_STR);
        $statement->bindValue(':annee', $GLOBALS["annee"], PDO::PARAM_INT);
        $statement->bindValue(':synopsis', $GLOBALS["synopsis"], PDO::PARAM_STR);
        $statement->bindValue(':url', $GLOBALS["url"], PDO::PARAM_STR);
        $statement->bindValue(':id_realisateur', $id_realisateur, PDO::PARAM_INT);
        $statement->bindValue(':id_acteurs', $id_acteurs, PDO::PARAM_INT);
        $statement->bindValue(':id_theme', $id_theme, PDO::PARAM_INT);
        $statement->bindValue(':imageurl', $GLOBALS["imageurl"], PDO::PARAM_STR);

        try {
            $statement->execute();
            echo "<br>"."Film ajouté avec succès";
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
