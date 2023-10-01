<?php




if (!empty($_POST)) {
    require_once("../../../db.php");
    $errors = array();






    $nom = htmlspecialchars(strip_tags(trim(strtolower($_POST['nomUp']))));
    $prenom = htmlspecialchars(strip_tags(trim(strtolower($_POST['prenomUp']))));
    $etablissement = htmlspecialchars(strip_tags(trim(strtolower($_POST['etablissement']))));
    $specialite = htmlspecialchars(strip_tags(trim(strtolower($_POST['specialite']))));
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['emailUp']))));
    $date = htmlspecialchars(strip_tags(trim(strtolower($_POST['date']))));
    $password = htmlspecialchars(strip_tags(trim(strtolower($_POST['passwordUp']))));
    $passwordConf = htmlspecialchars(strip_tags(trim(strtolower($_POST['passwordConf']))));


    /*************Verification de nom **************** */

    if (empty($nom)) {
        $errors['nomVide'] = "Veuillez saisir votre nom";
    } else if (!preg_match("/^[a-zA-Z0-9_]+$/", $nom) || strlen($nom) > 25 || strlen($nom) < 3) {
        $errors['nom'] = "Désolé, votre nom semble invalide,essayer avec un autre";
    }








    // ****************************VERIFICATION DE PRENOM ******************************

    if (empty($prenom)) {
        $errors['prenomVide'] = "Veuillez saisir votre prenom";
    } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $prenom) || strlen($prenom) > 25 || strlen($prenom) < 3) {
        $errors['prenom'] = "Désolé, votre prenom semble invalide,essayer avec un autre";
    }




    //   ******************************* VERIFICATION DE MAIL **********************************



    if (empty($email)) {
        $errors['emailVide'] = "Veuillez saisir votre adresse email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors['emailInv'] = "Adresse email invalide, réussiez!!";
    } else {

        $resultat = $db->query("SELECT id FROM users WHERE email='$email'");
        while ($article = $resultat->fetch(PDO::FETCH_OBJ)) {
            if ($article) {
                $errors['email'] = 'Cet email existe déjà';
            }
        }
    }




    //    **************************** VERIFICATION D'ETABLISSEMENT***********************************

    if (empty($etablissement)) {
        $errors['etablissementVide'] = "Veuillez saisir votre établissement";
    } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $etablissement) || strlen($etablissement) > 30 || strlen($etablissement) < 2) {
        $errors['etablissement'] = "Désolé, le nom d'établissement semble invalide";
    }



    /****************************************VERIFICATION de specialite******************************** */

    if (empty($specialite)) {
        $errors['specialiteVide'] = "Veuillez saisir votre spécialité";
    } else if (!preg_match("/^[a-zA-Z0-9_]+$/", $specialite) || strlen($specialite) > 30 || strlen($specialite) < 2)


        $errors['specialite'] = "Désolé, le nom de spécialiteé semble invalide";

    // *******************************VERIFICATION DU MOT DE PASSE**************************************
    if (empty($password)) {
        $errors['password'] = "Veuillez saisir un mot de passe";
    } else if (strlen($password) < 5 || !preg_match("/^.*[!@§\^£+\/%\?#$&\*].*$/", $password)) {
        $errors['passwordMin'] = "Votre mot de passe doit contenir au minimum six caractères et un caractère spécial (!@§^£+/%?#$&*)";
    }


    if ($password != $passwordConf) {
        $errors['passwordConf'] = "Les mots de passe ne se correspondent pas ";
    }

    //**************************************Verification de date de naissance ******************************************* */


    if (empty($date)) {
        $errors['dateVide'] = "Veuillez saisir une date valide";
    } else if (strtotime($date) > strtotime('01/01/2006')) {
        $errors['dateMin'] = "la date de naissance doit être supérieure à 01/01/2006";
    }
    // **************insertion de la base de données *********************
    if (empty($errors)) {


        $statement = $db->prepare("INSERT INTO users(nom,prenom,email,etablissement,specialite,pw,dateNaissance)VALUES(:nom,:prenom,:email,:etablissement,:specialite,:password,:date)");
        $statement->execute([

            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "etablissement" => $etablissement,
            "specialite" => $specialite,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "date" => $date,

        ]);
        require_once '../../../mail.php';


        $mail->setFrom('touriaa.abbou@gmail.com', mb_encode_mimeheader('site de l\'éthique médicale', 'UTF-8'));
        $mail->addAddress('touriaa.abbou@gmail.com');
        $mail->Subject = mb_encode_mimeheader('Message envoyé par le site de l\'éthique médicale', 'UTF-8');

        $message = "Ce message vous a été envoyé via le site d'éthique biomédicale pour le candidat<br>
   <b>Prenom : </b>" . $prenom . "<br>
   <b>Nom :</b> " . $nom . ".<br>
   <b>établissement : </b>" . $etablissement . ".<br>
  <b>spécialité : </b>" . $specialite . ".<br>
  <b>Message :</b> Veuillez consulter le site pour accepter ou refuser ce candidat.";
        $mail->Body    = $message;
       
        try {

            $resulate =   $mail->send();
        } catch (Exception $e) {
        }


        $errors = null;
    }


    $db = null;
    echo json_encode($errors);
}
