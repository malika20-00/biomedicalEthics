<?php
 require_once '../mail.php';


if (!empty($_POST)){
    $errors = array();

   
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
    
    $response = htmlspecialchars(strip_tags(trim(strtolower($_POST['response']))));

    if(empty($response)){
        $errors['messageVid']="le message est vide";

    }

    if(empty($errors)){
     
      
      
       try {
        $mail->setFrom('touriaa.abbou@gmail.com',mb_encode_mimeheader( 'site de l\'éthique médicale', 'UTF-8'));
        $mail->addAddress($email);
        $mail->Subject = mb_encode_mimeheader('Message envoyé par le site de l\'éthique médicale', 'UTF-8');
        $mail->Body    = $response;
         $resulate=   $mail->send();
     
         

          $errors['reussi'] = "<span style='green'>Votre message a été bien envoyé<span>";
      } catch (Exception $e) {
           $errors['echou'] = "Une erreur a été servenu";
       }

    }
    echo json_encode($errors);
}
