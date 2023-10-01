
<?php
require_once("../../db.php");
session_start();
$resultatQuestions=$db->query("SELECT * FROM temps");
     
$article=$resultatQuestions->fetch(PDO::FETCH_OBJ);
$nombreQuestions=$article->nombreQuestions;
$resultatExam=$db->query("SELECT * FROM exam ORDER BY id DESC");
$nbrQuestionsReel=$resultatExam->rowCount();
if($nbrQuestionsReel<$nombreQuestions){
  $nombreQuestions=$nbrQuestionsReel;
}
$idutilisateur=$_SESSION['id'];
if (!empty($_POST)){
$sum=0;
for($i=1;$i<$nombreQuestions+1 ;$i++){
  $name='q'.$i;
  $nomId=$name.'id';
  $id=$_POST[$nomId];
  if(isset($_POST[$name])){
    $monReponse=$_POST[$name];
    $resultat=$db->query("SELECT * FROM exam WHERE id='$id'");
    $article=$resultat->fetch(PDO::FETCH_OBJ);
    $reponse=$article->reponse;
    $reponseValide='choix'. $reponse;
    if( $reponseValide==$monReponse){
     $sum+=1;
    }
    }
}

$noteFinale=$sum/$nombreQuestions;
$notef=$sum.'/'.$nombreQuestions;
if($noteFinale>=0.5){
    
    $db->exec("UPDATE table1 SET valider=true ,note='$notef' WHERE id=$idutilisateur");
    $_SESSION['note']=$notef;
    $_SESSION['notValide']=0;
    $_SESSION['valider']=true;
   
}
else{
  if( $_SESSION['valider']==false){
  
    $n=$_SESSION['notValide']+1;
    $db->exec("UPDATE table1 SET notValide=$n , note='$notef' WHERE id=$idutilisateur");
    $_SESSION['note']=$notef;
    $_SESSION['notValide']++;
    if($n==3){
   
    $datenow=new DateTime();
    $dn=$datenow->format('Y-m-d');
    $date=new DateTime();
   $result = $date->format('Y-m-d ');
$db->exec("UPDATE table1 SET time='$result' WHERE id=$idutilisateur");
  $_SESSION['time']=$result;
  
    
    }
}}
$db=null;

//echo 'votre note est : '.$sum.'/10';
    ?>
     <LINK href="note2.css" rel="stylesheet" type="text/css">
    <div class="grandContenu">
      <?php
      if($_SESSION['valider']==true) {
        ?>
<p> Félicitations, vous avez validé le test</p>
<p>votre note est : <span><?php echo $_SESSION['note']; ?></span> </p>
<!-- <a href="certificat.php">télécharger votre certificat</a> -->

<!-- <button class="commencerTest" id="retourTest" style="  width: 40%;max-width:120px;margin-top:15px">retour</button> -->
<button class="commencerTest" id="telechargerCertificat" >télécharger votre certificat</button>
<br>
<a href="contenu.php" style="  margin-top:15px;display:block">retour</a>
</div>
<img src="felecitations.jfif" alt="">
     <?php }
     else{
      ?>
<p>  vous avez raté le test</p>
<p>votre note est :<?php echo $_SESSION['note']; ?> </p>
<button class="commencerTest" id="retourTest" style="  width: 40%;max-width:120px;">retour</button>
</div>
    <?php }}
      ?>
 <script src="script.js"></script>