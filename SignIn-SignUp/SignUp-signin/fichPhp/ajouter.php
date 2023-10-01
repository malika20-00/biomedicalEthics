<?php
$_success = 0; 
if (!empty($_POST)){
    $errors = array();
    

    $nom = htmlspecialchars(strip_tags(trim(strtolower($_POST['nomUp']))));
    $prenom = htmlspecialchars(strip_tags(trim(strtolower($_POST['prenomUp']))));
    $etablissement = htmlspecialchars(strip_tags(trim(strtolower($_POST['etablissement']))));
    $specialite = htmlspecialchars(strip_tags(trim(strtolower($_POST['specialite']))));
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['emailUp']))));
    $password = htmlspecialchars(strip_tags(trim(strtolower($_POST['passwordUp']))));
    $passwordConf = htmlspecialchars(strip_tags(trim(strtolower($_POST['passwordConf']))));

    if(empty($nom)){
        $errors['nomVide']="Veuillez saisir votre nom";

    }
    else if(!preg_match('/^[a-zA-Z0-9_]+$/',$nom))
    {
       $errors['nom']="Désolé, votre nom semble invalide,essayer avec un autre";
    }
    

    // else {
        
    //         $query ="SELECT id FROM users WHERE nom='$nom'  ";
    //         $result = mysqli_query($con,$query);
    //         $user = mysqli_fetch_array($result);
    //         if($user){
    //             $errors['username']='Ce nom existe déjà';
            
    //         }
    //        }



         

}






