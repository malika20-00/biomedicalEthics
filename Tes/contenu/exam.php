<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK href="../../style/examstyle.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>exam</title>

</head>
<body >
 
<?php 
session_start();
if(!isset($_SESSION['email'])){
  header("Location:../../accueil/accueil.php"); 

}
else if($_SESSION['valider']==true){
  header("Location:examValide.php"); 
}
// include '../header/header.php';

  $time=$_SESSION['time'];
  $timeuser=strtotime($time);
  $timeuser_plus_mois=strtotime('+7 day',$timeuser);
  $timeuser_plus_mois_format=date('Y-m-d',  $timeuser_plus_mois);
  $datenow=new DateTime();
  $now=$datenow->format('Y-m-d');
  if( $_SESSION['notValide']>2 && $now< $timeuser_plus_mois_format){
   
    ?>
    <div class="blocage">
<p>Vous ne pouvez pas passer l'examen car vous avez échoué 3 fois !</p>
<p>Le cours sera affiché  le :<span><?php echo  $timeuser_plus_mois_format;?> </span></p>
<button class="commencerTest" id="retourTest" style="  width: 40%;max-width:120px;">retour</button>
</div>
 <?php }
 
 

// *************
else{
require_once("../../db.php");
// if($_SESSION['Admin']==0){
//   $_SESSION['commencerTest']=true;
// }


 ?>
 <div class="header">
  <div class="img_logo">
  <img src="../header/logo.jfif" alt="logo" >
  <p class="title">CERBO</p>
  </div>

<div  >
  <p id="temps"></p>
</div>

 </div>
<div>

<div class="p1"> <div class="p1_i"> <i class="fa fa-pencil-square-o " ></i> </div><p>sélectionnez la bonne réponse:</p></div>

<form action="note2.php" method='post'>

<?php
$i=0;

      $resultat=$db->query("SELECT * FROM temps");
     
    $article=$resultat->fetch(PDO::FETCH_OBJ);
    $nombreQuestions=$article->nombreQuestions;
        
 $resultat=$db->query("SELECT * FROM exam order by RAND() LIMIT $nombreQuestions");
 while($article=$resultat->fetch(PDO::FETCH_OBJ)){
   $i++;
  $name='q'.$i;
  $c1=$name.'choix1';
  $c2=$name.'choix2';
  $c3=$name.'choix3';
  $id=$article->id;
  //$idQuestionName=$name.'id';
  $question=$article->question;
  $choix1=$article->choix1;
  $choix2=$article->choix2;
  $choix3=$article->choix3;

?>
 <input type="hidden" name=<?php echo $name.'id';?> value="<?php echo $id; ?>">
<div class="blockQuestion">
<p class="question"><?php echo $question ;?></p>
<div  class="formDiv">
<div class="classA">
  <p>A</p>
</div>
<input type="radio" name=<?php echo $name;?>  class="demo1" id=<?php echo $c1;?>  value="choix1">
<label for=<?php echo $c1;?>><?php echo $choix1;?></label>
</div>
<div  class="formDiv">
<div class="classA">
  <p>B</p>
</div>
<input type="radio" name=<?php echo $name;?> class="demo1"  id=<?php echo $c2;?> value="choix2">
<label for=<?php echo $c2;?>><?php echo $choix2;?></label>
</div>
<div  class="formDiv">
<div class="classA">
  <p>C</p>
</div>
<input type="radio" name=<?php echo $name;?> class="demo1" id=<?php echo $c3;?> value="choix3">
<label for=<?php echo $c3;?>><?php echo $choix3;?> </label>
</div>
</div>
<?php
}?>
<input id="enregistrer" type="submit" value="Enregister">
</form>
</div>
<?php 
  $db=null;
 }?>
<script src="script.js"></script>
</body>
</html>