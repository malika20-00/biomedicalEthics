<?php
if(!empty($_POST)){
$errors = array();
require_once("../db.php");
if(isset($_POST['temps']) and !empty($_POST['temps'])){
 $s= $_POST['temps'];

if(is_numeric($s) and $s>0){
 
   $db->query("UPDATE temps     SET duree ='$s'     WHERE 1");


}
else{
    $errors["erreur"]="entrer un nombre positif";
}

} 
if(empty($errors) and isset($_POST['nombreQuestions']) and !empty($_POST['nombreQuestions'])){
    $s= $_POST['nombreQuestions'];
   if(is_numeric($s) and $s>0){
    
      $db->query("UPDATE temps     SET nombreQuestions ='$s'  WHERE 1");
   
  // $errors["sucess"]="Le durée a été bien saisie";
   }
   else{
    $errors["erreur"]="entrer un nombre positif";
}
   }
 
if(empty($errors)){
    $errors["erreur"]="<span style='color:green'>les informations sont bien  modifiées</span>";
}
$db=null;
echo json_encode($errors);
}