
<?php
 

 session_start();
 if (!empty($_POST)){
  require_once("../db.php");
   $errors = array();
   $nomFormateur = htmlspecialchars(strip_tags(trim(strtolower($_POST['nom']))));
   $prenomFormateur= htmlspecialchars(strip_tags(trim(strtolower($_POST['prenom']))));
   $emailFormateur= htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
   $passwordFormateur= htmlspecialchars(strip_tags(trim(strtolower($_POST['password']))));
  
   if(empty($nomFormateur)){
       $errors['nomFormateurVide']="Veuillez saisir le nom ";
     

   }
 
   if(empty($prenomFormateur) and empty($errors) ){
       $errors['prenomFormateurVide']="Veuillez saisir le prenom";

   }
//    /////////////////////email
   if(empty($emailFormateur) ){
    $errors['emailFormateurVide']="Veuillez saisir votre adresse email";

}
 else if(!filter_var($emailFormateur,FILTER_VALIDATE_EMAIL) ){
    
    $errors['emailInv']="Adresse email invalide, réussiez!!";
}
else{
  $emailAncien= $_SESSION['email'];
   if($emailFormateur!=$emailAncien){
  
      $resultat=$db->query("SELECT id FROM admins WHERE email='$emailFormateur'");
              $article=$resultat->fetch(PDO::FETCH_OBJ);
                  if($article) {
                      $errors['email']='Cet email existe déjà';           
  }
   }   
    }



// else {
//     $api_key = "f135cea8e629479bb8d358aa2f16d4a6";

//     $ch = curl_init();
    
//     curl_setopt_array($ch, [
//         CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$emailFormateur",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_FOLLOWLOCATION => true
//     ]);
    
//     $response = curl_exec($ch);
    
//     curl_close($ch);
    
//     $data = json_decode($response, true);

//     if($data['deliverability'] === "UNDELIVERABLE" and empty($errors)){ 

//     // $errors['emailExist']="Cet email n'existe pas";
// }
// // else {
// //     $emailAncien= $_SESSION['email'];
// //     if($emailFormateur!=$emailAncien){
// //         $resultat=$db->query("SELECT id FROM admins WHERE email='$emailFormateur'");
// //         while($article=$resultat->fetch(PDO::FETCH_OBJ)){
// //             if($article) {
// //                 $errors['email']='Cet email existe déjà';
// //             }
    
    
    
// //         }
// //     }

   
// // }
//    }
///////////////////password
if(empty($passwordFormateur) ){
  $errors['passwordFormateurVide']="Veuillez saisir le mot de passe";

}
//photo de profil
$id= $_SESSION['id'];
$extensionUpload ;
    


    // =============================
   // if (isset($_FILES['photoProfil']) and !empty($_FILES['photoProfil']['name']))
   if (isset($_FILES['photoProfil']) and !empty($_FILES['photoProfil']['name']))  {
               $extensionValide = array('jpg', 'jpeg', 'png','jfif');
                   $extensionUpload = strtolower(substr(strrchr($_FILES['photoProfil']['name'], '.'), 1));
       
                   if (in_array($extensionUpload, $extensionValide)) {
                       $chemin = 'photoProfilFormateur/' . $_SESSION['id'] . '.' . $extensionUpload;
                       $resultat = move_uploaded_file($_FILES['photoProfil']['tmp_name'], $chemin);
                       if($resultat and empty($errors)) {
                        $nouveauPhoto = $_SESSION['id'] . '.' . $extensionUpload;
                        $db->exec("UPDATE admins SET photoProfil='$nouveauPhoto' where id=$id");
                        $_SESSION['photoProfil'] = $nouveauPhoto;
                      
                       }
                       else if(!$resultat){
                      
                       //   $errors['erreur_importation']="erreur pendant l'importation de fichier";
                         
                      }
                   } else { 
                    
                       $errors['format']='entrer une image,votre format doit être png jpeg ,jpg,jfif';
                      
                   }
             
           }
         
  if(empty($errors)){
    // $nouveauPhoto = $_SESSION['id'] . '.' . $extensionUpload;
    // $db->exec("UPDATE admins SET photoProfil='$nouveauPhoto' where id=$id");
    $passwordHacher=password_hash($passwordFormateur,PASSWORD_DEFAULT) ;
    $db->exec("UPDATE admins SET nom='$nomFormateur',prenom='$prenomFormateur',email='$emailFormateur',password='$passwordHacher' where id=$id");
    $_SESSION['nom']=$nomFormateur;
    $_SESSION['prenom']=$prenomFormateur;
    $_SESSION['email']=$emailFormateur;
    $_SESSION['password']=$passwordFormateur;
    $errors=null;
 //   $_SESSION['photoProfil'] = $nouveauPhoto;
  
   }

  
  $db=null;
  echo json_encode($errors);
  
}

// ====================
?>
