<?php

if (!empty($_POST)) {
    require_once('../../db.php');
    require_once '../../mail.php';
    $errors = array();

    $nom = htmlspecialchars(strip_tags(trim(strtolower($_POST['nom']))));
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
    $message = htmlspecialchars(strip_tags(trim(strtolower($_POST['message']))));
    /***************************nom*************************/
    if (empty($nom)) {
        $errors['nomVide'] = "Veuillez saisir votre nom";
    } else if (!preg_match("/^[a-zA-Z0-9\s]+$/", $nom) || strlen($nom) > 25 || strlen($nom) < 3) {
        $errors['nom'] = "Désolé, votre nom semble invalide,essayer avec un autre";
    }
 
    /******************************email**********************/
    if (empty($email)) {
        $errors['emailVide'] = "Veuillez saisir votre adresse email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors['emailInv'] = "Adresse email invalide, réussiez!!";
    }
    /***************************message************/
    if (empty($message)) {
        $errors['messageVide'] = "Veuillez saisir le message";
    }
    if (empty($errors)) {

        $mail->setFrom('touriaa.abbou@gmail.com',mb_encode_mimeheader( 'site de l\'éthique médicale', 'UTF-8'));
        $mail->addAddress('touriaa.abbou@gmail.com');
        $mail->Subject = mb_encode_mimeheader('Message envoyé par le site de l\'éthique médicale', 'UTF-8');
        $message = "Ce message vous a été envoyé via le site de l'éthique médicale par : <br>
                        
                        <b>Nom : </b>" . $_POST["nom"] . "<br>
                        <b>Message : </b>" . $_POST["message"];
        $mail->Body    = $message;
        $mail->addReplyTo($_POST["email"], 'Information');
        try {
            
          $resulate=   $mail->send();
      
            $statement = $db->prepare('INSERT INTO messages(nom,prenom,email,message) VALUES(:nom,:prenom,:email,:message)');
            $statement->execute([
                "nom" => $_POST["nom"],
                "prenom" => null,
                "email" => $_POST["email"],
                "message" => $_POST["message"],

            ]);

           $errors['reussi'] = "<p style='color:green'>Votre message a été bien envoyé</span>";
       } catch (Exception $e) {
            $errors['echou'] = "Une erreur a été servenu";
        }
    }
    $db = null;
    echo json_encode($errors);
}
