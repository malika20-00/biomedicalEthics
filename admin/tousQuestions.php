<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Admin</title>
    <!-- material icon  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- STYLESHEET -->
      <link rel="stylesheet" href="./asserts/css/ajouterCours.css">
  
    <link rel="stylesheet" href="./asserts/css/communStyle.css">
    <link rel="stylesheet" href="./asserts/css/condidats.css">
    <link rel="stylesheet" href="./asserts/css/demandes.css">
    <link rel="stylesheet" href="./asserts/css/examen.css">
  

</head>
<body>

<?php
 session_start();
if(!isset($_SESSION['email'])){
    header("Location:../accueil/accueil.php"); 
 echo 'mmmm';
}
else{
    if($_SESSION['Admin']==0){
       header("Location:../accueil/accueil.php"); 
 echo 'nnn';
    }
    require_once("../db.php");
    ?>
  
     <!-- ---------------------- END OF ASIDE -------------------------- -->
<div class="container_div_question" style="width: 90%;margin:10px auto ;">
<div class="recent-demands" >


<p class="titre2">Tous les questions</p>


<!-- <form action="note2.php" method='post'> -->

<?php

 $resultat=$db->query("SELECT * FROM exam ");
 while($article=$resultat->fetch(PDO::FETCH_OBJ)){
   
  //$idQuestionName=$name.'id';
  $question=$article->question;
  $choix1=$article->choix1;
  $choix2=$article->choix2;
  $choix3=$article->choix3;
  $id=$article->id;
?>
<div class="blockQuestion" id="<?php echo $id;?>">
<i class="material-icons" onclick="supprimerQuestion(<?php  echo $id;?>)" style="float:right;cursor:pointer;margin-left:10px">delete_forever</i>
   
<p class="question"><?php echo $question ;?></p>
<div  class="formDiv">
<div class="classA">
  <p>1</p>
</div>
<label ><?php echo $choix1;?></label>
</div>
<div  class="formDiv">
<div class="classA">
  <p>2</p>
</div>
<label ><?php echo $choix2;?></label>
</div>
<div  class="formDiv">
<div class="classA">
  <p>3</p>
</div>
<label ><?php echo $choix3;?> </label>
</div>
</div>
<?php
}?>




    </div>
    <div style="height:20px"></div>
    </div>
    <?php
  $db=null;
  }?>
     <script src="./Js/index.js"></script>
   

</body>
</html>

