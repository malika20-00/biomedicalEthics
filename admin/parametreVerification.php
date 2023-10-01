
<?php
 

 session_start();
 if (!empty($_POST)){
  require_once("../db.php");
   $errors = array();
   $nomFormateur = htmlspecialchars(strip_tags(trim(strtolower($_POST['nomFormateur']))));
   $prenomFormateur= htmlspecialchars(strip_tags(trim(strtolower($_POST['prenomFormateur']))));
   $emailFormateur= htmlspecialchars(strip_tags(trim(strtolower($_POST['emailFormateur']))));
   $passwordFormateur= htmlspecialchars(strip_tags(trim(strtolower($_POST['passwordFormateur']))));
  
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
  $resultat=$db->query("SELECT id FROM admins WHERE email='$emailFormateur'");
          while($article=$resultat->fetch(PDO::FETCH_OBJ)){
              if($article) {
                  $errors['email']='Cet email existe déjà';
              }
   }  } 
  //  }

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
     $nouveauPhoto='vide.jpg';
   if (isset($_FILES['photoProfilFormateur']) and !empty($_FILES['photoProfilFormateur']['name']))  {
               $extensionValide = array('jpg', 'jpeg', 'png','jfif');
                   $extensionUpload = strtolower(substr(strrchr($_FILES['photoProfilFormateur']['name'], '.'), 1));
       
                   if (in_array($extensionUpload, $extensionValide)) {
                       $chemin = 'photoProfilFormateur/' . $_SESSION['id'] . '.' . $extensionUpload;
                       $resultat = move_uploaded_file($_FILES['photoProfilFormateur']['tmp_name'], $chemin);
                       if($resultat and empty($errors)) {
                        $nouveauPhoto = $_SESSION['id'] . '.' . $extensionUpload;
                  
                      
                       }
                       else if(!$resultat){
                      
                       //   $errors['erreur_importation']="erreur pendant l'importation de fichier";
                         
                      }
                   } else { 
                    
                       $errors['format']='entrer une image,votre format doit être png jpeg ,jpg,jfif';
                      
                   }
             
           }
         
  if(empty($errors)){
    $passwordHacher=password_hash($passwordFormateur,PASSWORD_DEFAULT) ;

  $db->exec("INSERT INTO  admins (nom,prenom,email,password,photoProfil) values('$nomFormateur','$prenomFormateur','$emailFormateur','$passwordHacher','$nouveauPhoto') ");
    $errors=null;
 
  
   }

  
  $db=null;
  echo json_encode($errors);
  
}

// ====================
?>
