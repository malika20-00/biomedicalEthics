<?php
// require_once("../../db.php");
?>

<div id="form-oublie" class="form-oublie">
    <form id="oubliAjax"action="" method="post">
        <h3 class="title-verif">Retrouvez votre compte</h3>
        <span style="text-align: justify">Veuillez entrer votre adresse e-mail pour rechercher votre compte.</span>
        <br>
        <!-- <input type="email" name="email" id="email"> -->
        <div class="input-field">
            <i style="margin-top:7px;" class="fa-solid fa-envelope"></i>
            <input type="text" placeholder="E-mail" name="email" id="email">

        </div>
        <br>
        <input style="" type="submit" class="btn-oublie" value="Envoyer">
    </form>

</div>
<p id="erreurAjax" ></p>
 <?php
// if (isset($_POST['email'])) {
//     require_once '../../mail.php';
//     $password = uniqid();
//     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//     $message = "Bonjour, voici votre nouveau mot de passe : $password";



//     $mail->setFrom('touriaa.abbou@gmail.com', mb_encode_mimeheader('site de l\'éthique médicale', 'UTF-8'));
//     $mail->addAddress($_POST['email']);
//     $mail->Subject = mb_encode_mimeheader('Changement du mot de passe', 'UTF-8');

//     $mail->Body    = $message;
//     $email = $_POST['email'];
//     $verif = 0;
//     $resultat = $db->query("SELECT id FROM users WHERE email='$email'");
//     while ($article = $resultat->fetch(PDO::FETCH_OBJ)) {
//         if ($article) {
//             $verif  = 1;
//         }
//     }
//     if ($verif  == 1) {
//         try {

//             $mail->send();
//             $sql = "update users set pw = ? where email = ? ";
//             $stmt = $db->prepare($sql);
//             $stmt->execute([$hashedPassword, $_POST['email']]);
//             echo "Mail envoyé";
//         } catch (Exception $e) {
//             echo "Une erreur est survenue, veuillez réessayer";
//         }
//     } else {
//         echo "vous n'êtes pas encore inscrit(e)";
//     }




 
// }
// $db = null; 
?>