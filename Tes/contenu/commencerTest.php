<html>
    <head>
    <script type="text/javascript">
        window.history.forward();
    </script>
    </head>
    <body>
<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location:../../accueil/accueil.php"); 
 
}
require_once("../../db.php");
      $resultat=$db->query("SELECT * FROM temps");
     
    $article=$resultat->fetch(PDO::FETCH_OBJ);
    $duree=$article->duree;
    $nombreQuestions=$article->nombreQuestions;
    $resultatExam=$db->query("SELECT * FROM exam ORDER BY id DESC");
$nbrQuestionsReel=$resultatExam->rowCount();
if($nbrQuestionsReel<$nombreQuestions){
  $nombreQuestions=$nbrQuestionsReel;
}
      $db=null;  
?>
<LINK href="note2.css" rel="stylesheet" type="text/css">
<div class="grandContenu">
<p class="titre">consignes générales</p>
<p>Vous avez <span><?php echo $duree;?></span> minutes et <span><?php echo $nombreQuestions;?></span> questions pour passer ce test (sous forme d'un QCM).</p>
    <ul>         
        <li>Vous aurez un point pour toute réponse juste,et 0 pour toute réponse erronée ou vide.</li>
        <li>Pour obtenir le certificat, vous devez au minimum avoir 50% de réponses justes.</li>
        <li>Si vous avez échoué trois fois, l'examen sera bloqué à une date ultérieur.</li>
    </ul>
<button class="commencerTest" id="commencerTest">commencer le test</button>


</div>
<script src="script.js"></script>
</body>
</html>