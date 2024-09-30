<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "cube3";

$pseudo = $_SESSION['username'];
$id_user = $_SESSION['id_user'];

if (isset($_POST['nouveauPseudo'])) {
    $nouveauPseudo = htmlspecialchars($_POST['nouveauPseudo']);
    // Convertir le nouveau pseudo en minuscules (ou majuscules, selon votre préférence)
    $nouveauPseudo = strtolower($nouveauPseudo);
} else {
    $nouveauPseudo = $pseudo;
}

if (isset($_POST['nouveauEmail'])) {
    $nouveauEmail = htmlspecialchars($_POST['nouveauEmail']);
} else {
    $nouveauEmail = $_SESSION['email'];
}

if (isset($_POST['nouveauAge'])) {
    $nouveauAge = htmlspecialchars($_POST['nouveauAge']);
} else {
    $nouveauAge = $_SESSION['age'];
}

$ancienMDP = isset($_POST['ancienMDP']) ? $_POST['ancienMDP'] : '';
$nouveauMDP = isset($_POST['nouveauMDP']) ? $_POST['nouveauMDP'] : '';

try {
    $db = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
} catch (Exception $e) {
    echo 'Erreur de connexion à la base de données';
}

function verifierPseudo($pseudo, $id_user, $db) {
    $sql = "SELECT username FROM user WHERE id_user = :id_user";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return strcasecmp($user['username'], $pseudo) === 0;
}

if (verifierPseudo($nouveauPseudo, $id_user, $db)) {
    $sqlUpdate = "UPDATE user SET email = :nouveauEmail, age = :nouveauAge WHERE id_user = :id_user";
    $stmtUpdate = $db->prepare($sqlUpdate);
    $stmtUpdate->bindValue(':nouveauEmail', $nouveauEmail, PDO::PARAM_STR);
    $stmtUpdate->bindValue(':nouveauAge', $nouveauAge, PDO::PARAM_INT);
    $stmtUpdate->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $stmtUpdate->execute();

    if (!empty($nouveauMDP) && $nouveauMDP !== $ancienMDP) {
        // Hachez le nouveau mot de passe
        $hashedPassword = password_hash($nouveauMDP, PASSWORD_BCRYPT);

        // Mettez à jour le champ de mot de passe (pwd) avec le mot de passe haché
        $sqlUpdatePassword = "UPDATE user SET pwd = :nouveauMDP WHERE id_user = :id_user";
        $stmtUpdatePassword = $db->prepare($sqlUpdatePassword);
        $stmtUpdatePassword->bindValue(':nouveauMDP', $hashedPassword, PDO::PARAM_STR);
        $stmtUpdatePassword->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stmtUpdatePassword->execute();
        echo "Mot de passe bien modifié. <a href='account.php'>Retour</a>";
    } else {
        echo "Aucune modification du mot de passe. <a href='account.php'>Retour</a>";
    }

    header('Location: account.php');
    exit();
} else {
    echo "Pseudo incorrect. <a href='login.php'>Réessayer</a>";
}
?>










