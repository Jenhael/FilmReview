<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Spécifiez le chemin vers le fichier autoload.php de PHPMailer
require 'C:\wamp64\www\Cube3\PHPMailer 6.8.1\PHPMailer-PHPMailer-dd01c56\src\PHPMailer.php';
require 'C:\wamp64\www\Cube3\PHPMailer 6.8.1\PHPMailer-PHPMailer-dd01c56\src\Exception.php';
require 'C:\wamp64\www\Cube3\PHPMailer 6.8.1\PHPMailer-PHPMailer-dd01c56\src\SMTP.php';

// Créez une instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Paramètres SMTP pour Outlook
    $mail->SMTPDebug = 2; // Active le débogage SMTP (à des fins de débogage)
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bbb.commerce@hotmail.com'; // Remplacez par votre adresse Outlook
    $mail->Password = 'Big092mlboa'; // pwd
    $mail->SMTPSecure = 'tls'; // Utilisez TLS
    $mail->Port = 587; // Port SMTP pour TLS
    $mail->SMTPDebug = 2;

    // Destinataire, expéditeur, sujet et contenu
    $mail->setFrom($_POST["email"], $_POST["nom"]);
    $mail->addAddress('bbb.commerce@hotmail.com', 'Jenhael');
    $mail->Subject = 'Sujet de l\'e-mail';
    $mail->Body = 'Contenu de l\'e-mail';

    // Envoi de l'e-mail
    $mail->send();
    echo 'E-mail envoyé avec succès.';
} catch (Exception $e) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
}
?>
