<?php 
require_once("../../../db.php");
if(!empty($_POST)){

   

    $erreur = array();
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['adresseIn']))));
    $password = htmlspecialchars(strip_tags(trim(strtolower($_POST['passwordIn']))));
   
    

    if(empty($email) || empty($password)){
        $erreur['empty'] = "Veuillez remplir tout les champs";

    }

    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            
        $erreur['emailInv']="Adresse email invalide, réussiez!!";
    }
    
     else {
         
///adminnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
$verif=0;

$resultat1=$db->query("SELECT * FROM admins");
while($article1=$resultat1->fetch(PDO::FETCH_OBJ) and  $verif==0 ){
    if($article1->email==$email && password_verify($password,$article1->password)){
    session_start();
    $verif=1;
    $erreur=null;
    $_SESSION['valeuravis']=0;
    $_SESSION['nom'] = $article1->nom;
    $_SESSION['prenom'] = $article1->prenom;
     $_SESSION ['password'] =$password;
     $_SESSION['id'] = $article1->id;
     $_SESSION['email']=$email;
     $_SESSION['pageHome']='contenu';
     $_SESSION['photoProfil']=$article1->photoProfil;
     $_SESSION['formateur']=$article1->formateur;
     $_SESSION['cerificat']=0;
     $_SESSION['time']='';
     $_SESSION['valider']=0;
     $_SESSION['notValide']=0;
     $_SESSION['Admin']=1;
 
     $_SESSION['dark']=$article1->dark;
     $_SESSION['note']=0;
     if(isset($_POST['check'])){
        setCookie('email',$email,time()+600000*3*239);
        setCookie('password',$password,time()+60*3*5555);
        
        
       }
     

}}
  

///fin adminnnnnnnnnnnnnnnnnnnnnnnnnnn 

        $resultat=$db->query("SELECT * FROM users");
        while($article=$resultat->fetch(PDO::FETCH_OBJ) and  $verif==0){
           
            if($article->email==$email && password_verify($password,$article->pw)){
                session_start();
                $verif=1;
            if(isset($_POST['check'])){
                setCookie('email',$email,time()+6000*3*239);
                setCookie('password',$password,time()+60*3*5555);
                
               
               }
            $erreur=null;
            $_SESSION['valeuravis']=0;
            $_SESSION['nom'] = $article->nom;
            $_SESSION['prenom'] = $article->prenom;

            $_SESSION['etablissement'] = $article->etablissement;
            $_SESSION['filiere'] = $article->specialite;
            $_SESSION['date'] = $article->dateNaissance;
            $_SESSION['biographie'] = $article->biographie;
            $_SESSION['pageHome']='contenu';
             $_SESSION ['password'] =$password;
             $_SESSION['id'] = $article->id;
             $_SESSION['email']=$email;
            $id= $_SESSION['id'];
            $_SESSION['accepte']=$article->accepte;
            $_SESSION['photoProfil']=$article->photoProfil;
            $_SESSION['Admin']=0;
             $resultat=$db->query("SELECT * FROM table1 where id=$id");
             while($article2=$resultat->fetch(PDO::FETCH_OBJ)){

            //  $_SESSION['formationAcctuel']=0;
            
             $_SESSION['cerificat']=$article2->certificat;
             $_SESSION['valider']=$article2->valider;
             $_SESSION['notValide']=$article2->notValide;
             $_SESSION['note']=$article2->note;
             $_SESSION['time']=$article2->time;
             $datenow=new DateTime();
             $time=$_SESSION['time'];
             $dn=$datenow->format('Y-m-d');
            $dd1=strtotime($time);
             $dd=strtotime('+1 month',$dd1);
             $d1=date('Y-m-d', $dd);
            
             if($_SESSION['notValide']>2 && $dn>=$d1) {
              $db->exec("UPDATE table1 SET notValide=0 WHERE id=$id");
             }
           
            
            // header('Location : reussi.php');

        
        }
      

    }
    }
        if(   $verif==0){
            $erreur['invalide'] = "Désolé, votre adresse E-mail ou mot de passe est invalide";
        }
        
     }
    
     echo json_encode($erreur);

     
}

if(!empty($_GET)){

    $info = array();
 if(isset($_COOKIE['password'])){
    $info['email']=$_COOKIE['email'];
    }
    if(isset($_COOKIE['email'])){
        $info['password']=$_COOKIE['password'];
      }
      echo json_encode($info);
 
}
$db=null;

?>