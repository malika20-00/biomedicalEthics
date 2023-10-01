

<?php 

session_start();

if(!empty($_POST)){

    $errors = array();
    require_once("../../../db.php");



$nom=$_SESSION['nom'] =htmlspecialchars(trim(strtolower($_POST['nomUp'])));
$email=$_SESSION['prenom'] =htmlspecialchars(trim(strtolower( $_POST['prenomUp'])));
$etablissement =$_SESSION['etablissement'] =htmlspecialchars(trim(strtolower($_POST['etablissement'])));
$email=$_SESSION['email'] = htmlspecialchars(trim(strtolower($_POST['emailUp'])));
$specialite=$_SESSION['specialte'] =htmlspecialchars(trim(strtolower( $_POST['specialite'])));
$password=$_SESSION['password'] = htmlspecialchars(trim(strtolower($_POST['passwordUp'])));
// $password1 = password_hash($_POST['passwordUp'],PASSWORD_BCRYPT);
$password_conf  = htmlspecialchars(trim(strtolower($_POST['passwordConf'])));
 
if(empty($_SESSION['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_SESSION['nom'])){
    $errors['nom '] = "Votre nom est invalide, essayez avec un autre";


} else {
    $query ="SELECT id FROM users WHERE nom='$nom'  ";
    $result = mysqli_query($con,$query);
    $user = mysqli_fetch_array($result);
    if($user){
        $errors['username']='Ce nom existe déjà';
    }
}
    if(empty($_SESSION['email']) ||  !filter_var($_SESSION['email'],FILTER_VALIDATE_EMAIL)){
         
        $errors['email'] = 'Votre email est invalide ';
    }

    else {
        $query ="SELECT id FROM users WHERE email='$email'  ";
        $result = mysqli_query($con,$query);
        $user = mysqli_fetch_array($result);
        if($user){
            $errors['username']='Cet email existe déjà';
        }


}

            if(empty($password) || !preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})+$/',$password)){

                $errors['password']="<ul>un mot de passe valide aura
                <li>de 8 à 15 caractères</li>
                <li>au moins une lettre minuscule</li>
                <li>au moins une lettre majuscule</li>
                <li>au moins un chiffre</li>
                <li>au moins un de ces caractères spéciaux.</li>
                <ul>";

            }
            elseif($_SESSION['passwor'] != $password_conf ){
                $errors['password_conf']="Les mots de passe ne correspondent pas !";

            }

            if(empty($errors)){

                $query="INSERT INTO users(nom,prenom,email,etablissement,specialite,pw) VALUES ('$nom',$prenom,$email,$etablissement,$specialite,$password)";
                mysqli_query($con,$query);
                mysqli_close($con);

            }
            $db=null;
}