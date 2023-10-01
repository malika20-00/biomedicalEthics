
<?php

 session_start();
 if (!empty($_POST)){
  require_once("../db.php");
   $errors = array();
   $question = htmlspecialchars(strip_tags(trim(strtolower($_POST['question']))));
   $choix1= htmlspecialchars(strip_tags(trim(strtolower($_POST['choix1']))));
   $choix2= htmlspecialchars(strip_tags(trim(strtolower($_POST['choix2']))));
   $choix3= htmlspecialchars(strip_tags(trim(strtolower($_POST['choix3']))));
   $reponse= htmlspecialchars(strip_tags(trim(strtolower($_POST['reponse']))));
   if(empty($question)){
       $errors['questionVide']="Veuillez saisir le question";

   }
   if(empty($choix1)){
       $errors['choix1Vide']="Veuillez saisir le 1er choix";

   }
   if(empty($choix2)){
    $errors['choix2Vide']="Veuillez saisir le 2eme choix";

}
if(empty($choix3)){
  $errors['choix3Vide']="Veuillez saisir le 3eme choix";

}
if(empty($reponse)){
  $errors['reponse']="Veuillez choisir la bonne reponse";

}
$reponse=$_POST['reponse'];
  if(empty($errors)){
     
      
       $statement=$db->prepare("INSERT INTO exam(question,choix1,choix2,choix3,reponse)VALUES(:question,:choix1,:choix2,:choix3,:reponse)");
       $statement->execute([
          
        "question"=>$question,
       "choix1"=>$choix1,
         "choix2"=>$choix2,
        "choix3"=>$choix3,
         "reponse"=>$reponse,
        
       ]);
       $errors =null;
   }
   $db=null;
   echo json_encode($errors);
}
// ====================


 

?>
