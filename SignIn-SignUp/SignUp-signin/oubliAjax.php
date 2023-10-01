<?php
$error = array();
if (isset($_POST['email'])) {
    require_once '../../mail.php';
    require_once("../../db.php");
    $password = uniqid();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $message = "Bonjour, voici votre nouveau mot de passe : $password";



    $mail->setFrom('touriaa.abbou@gmail.com', mb_encode_mimeheader('site de l\'éthique médicale', 'UTF-8'));
    $mail->addAddress($_POST['email']);
    $mail->Subject = mb_encode_mimeheader('Changement du mot de passe', 'UTF-8');

    $mail->Body    = $message;
    $email = $_POST['email'];
    $verif = 0;
    $resultat = $db->query("SELECT id FROM users WHERE email='$email'");
    while ($article = $resultat->fetch(PDO::FETCH_OBJ)) {
        if ($article) {
            $verif  = 1;
        }
    }
    if ($verif  == 1) {
        try {

            $mail->send();
            $sql = "update users set pw = ? where email = ? ";
            $stmt = $db->prepare($sql);
            $stmt->execute([$hashedPassword, $_POST['email']]);
            $error['erreur']= "Mail envoyé";
        } catch (Exception $e) {
            $error['erreur'] =  "Une erreur est survenue, veuillez réessayer";
        }
    } else {
        $error['erreur'] =  "vous n'êtes pas encore inscrit(e)";
    }




 
}
$db = null;
echo json_encode($error);