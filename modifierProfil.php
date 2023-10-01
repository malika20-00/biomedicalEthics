
<?php
 
 require_once("db.php");
 session_start();
 if( $_SESSION['Admin']==0){
 if (!empty($_POST)){
   $errors = array();
   $nom = htmlspecialchars(strip_tags(trim(strtolower($_POST['nom']))));
   $prenom= htmlspecialchars(strip_tags(trim(strtolower($_POST['prenom']))));
   $email= htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
   $etablissement= htmlspecialchars(strip_tags(trim(strtolower($_POST['etablissement']))));
   $filiere= htmlspecialchars(strip_tags(trim(strtolower($_POST['filiere']))));
   $passwordNouveau= htmlspecialchars(strip_tags(trim(strtolower($_POST['pwN']))));
   $passwordAncien= htmlspecialchars(strip_tags(trim(strtolower($_POST['pwA']))));
   $date= htmlspecialchars(strip_tags(trim(strtolower($_POST['date']))));
   $biographie= htmlspecialchars(strip_tags(trim(strtolower($_POST['biographie']))));
   if(empty($nom)){
       $errors['nomVide']="Veuillez saisir le nom ";
   }
 
   if(empty($prenom) and empty($errors) ){
       $errors['prenomVide']="Veuillez saisir le prenom";
    }
//    /////////////////////email
   if(empty($email) ){
    $errors['emailVide']="Veuillez saisir votre adresse email";

}
 else if(!filter_var($email,FILTER_VALIDATE_EMAIL) ){
    
    $errors['emailInv']="Adresse email invalide, réussiez!!";
}
else{
$emailAncien= $_SESSION['email'];
 if($email!=$emailAncien){
    $resultat=$db->query("SELECT id FROM users WHERE email='$email'");
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
//         CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email",
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
// //     if($email!=$emailAncien){
// //         $resultat=$db->query("SELECT id FROM admins WHERE email='$email'");
// //         while($article=$resultat->fetch(PDO::FETCH_OBJ)){
// //             if($article) {
// //                 $errors['email']='Cet email existe déjà';
// //             }
    
    
    
// //         }
// //     }

   
// // }
//    }
///////////////////passwordAncien

///////////////////passwordNouveau

if(!empty($passwordNouveau) and empty($passwordAncien) ){
    $errors['passwordAncienVide']="Veuillez saisir l'ancien mot de passe";

}
else if(!empty($passwordAncien) ){
if($passwordAncien!=$_SESSION['password']){
   $errors['passwordAncienErrone']="le mot de passe ancien est incorrect".$_SESSION['password'];
  
}}

else if(!empty($passwordNouveau) and (strlen($passwordNouveau)<5 || !preg_match("/^.*[!@§\^£+\/%\?#$&\*].*$/",$passwordNouveau) )){
    $errors['passwordMin'] = "Votre mot de passe doit contenir au minimum six caractères et un caractère spécial (!@§^£+/%?#$&*)";

}

//etablissememt
if(empty($etablissement) ){
    $errors['etablissementVide']="Veuillez saisir l'etablissement";
  
  }
  //filiere
  if(empty($filiere) ){
    $errors['filiereVide']="Veuillez saisir la filiere";
  
  }
  //date
  if(empty($date)){
    $errors['dateVide'] = "Veuillez saisir une date valide";
}else if(strtotime($date) > strtotime('01/01/2006')){
    $errors['dateMin'] = "la date de naissance doit être supérieure à 01/01/2006";
}
//photo de profil
$id= $_SESSION['id'];
$extensionUpload ;
    


    // =============================
   if (isset($_FILES['photoProfil']) and !empty($_FILES['photoProfil']['name']))  {
               $extensionValide = array('jpg', 'jpeg', 'png','jfif');
                   $extensionUpload = strtolower(substr(strrchr($_FILES['photoProfil']['name'], '.'), 1));
       
                   if (in_array($extensionUpload, $extensionValide)) {
                       $chemin = 'photoProfil/' . $_SESSION['id'] . '.' . $extensionUpload;
                       $resultat = move_uploaded_file($_FILES['photoProfil']['tmp_name'], $chemin);
                       if($resultat and empty($errors)) {
                        $nouveauPhoto = $_SESSION['id'] . '.' . $extensionUpload;
                        $db->exec("UPDATE users SET photoProfil='$nouveauPhoto' where id=$id");
                        $_SESSION['photoProfil'] = $nouveauPhoto;
                      
                       }
                       else if(!$resultat){
                      
                       //   $errors['erreur_importation']="erreur pendant l'importation de fichier";
                         
                      }
                   } else { 
                    
                       $errors['format']='entrer une image,votre format doit être png jpeg ,jpg,jfif';
                      
                   }
             
           }


if(empty($errors) and $passwordNouveau){

 $passwordNouveauHacher=password_hash($passwordNouveau,PASSWORD_DEFAULT) ;

}
elseif(empty($errors) and !$passwordNouveau){
    $passwordNouveau=$_SESSION['password'];
    $passwordNouveauHacher=password_hash($passwordNouveau,PASSWORD_DEFAULT) ;
}

  if(empty($errors)){
    // $nouveauPhoto = $_SESSION['id'] . '.' . $extensionUpload;
    // $db->exec("UPDATE admins SET photoProfil='$nouveauPhoto' where id=$id");
    $db->exec("UPDATE users SET nom='$nom',prenom='$prenom',email='$email',pw='$passwordNouveauHacher', biographie=' $biographie',dateNaissance='$date',etablissement='$etablissement',specialite='$filiere' where id=$id");
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['email']=$email;
    $_SESSION['password']=$passwordNouveau;
    $_SESSION['etablissement']=$etablissement;
    $_SESSION['filiere']=$filiere;
    $_SESSION['biographie']=$biographie;
    $_SESSION['date']=$date;
   
    $errors=null;
   }

  
  
  echo json_encode($errors);
  
}
$db=null;
 }
// ====================
?>
