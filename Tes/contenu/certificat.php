<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<LINK href="../../style/certificat.css" rel="stylesheet" type="text/css">

<?php
session_start();
  if(!isset($_SESSION['email'])){
    header("Location:../../accueil/accueil.php"); 
 
}



else{ 
$email=$_SESSION['email'];

if( $_SESSION['valider']==true and $_SESSION['Admin']==0 ){

  require_once("../../db.php");
$idcertificat=rand(1111111111,9999999999);
$resultat=$db->query("SELECT * FROM table1");

$i=0;

if($_SESSION['cerificat']=='0'){
    while($article=$resultat->fetch(PDO::FETCH_OBJ)){
       $tab[$i]=$article->certificat;
       $i++;
      }
      for($j=0;$j<$i;$j++){
        if($idcertificat==$tab[$j]){
          $idcertificat=rand(11111111,9999999999);
          $j=0;
          
        }
      }
      $id=$_SESSION['id'];
      $db->exec("UPDATE table1 SET   certificat=$idcertificat WHERE id=$id");
      $_SESSION['cerificat']=$idcertificat;
    }
?>
<div  id="mon_cerificat">
  
  <div class="header_certificat">
  
    <p class="titre_certificat">CERTIFICAT </p>
    <div class="header_ligne_flex">
    <div class="ligne_header"></div>
    <P>Ethique Biomédicale</P>
 <div class="ligne_header"></div>
    </div>
    <div class="ligne_flex">
    <div class="ligne1"></div>
    <div class="ligne2"></div>
    </div>
  </div>
<div class="body_certificat">
  <div class="nom_flex">
<p class="name_c"><?php  echo  $_SESSION['prenom']; ?></p><p class="majiscule"><?php  echo  $_SESSION['nom']; ?></p>
</div>
<div class="infogeneral">
<p>né(e) le <?php  echo  $_SESSION['date']; ?></p>
<p>a terminé avec succès le cours, aussi validé et obtenu le certificat :</p>
  <p class="titre">Ethique Biomédicale</p>
</div>
<div class="image_flex">
<img src="../../image/c2.png" alt="certificat">
<div id="p">
<p>certificat numéro n°<?php echo $_SESSION['cerificat'];?></p>
<p>
<?php

$dt = new DateTime();
echo $dt->format('d F Y');
?>
</p>
</div>



</div>
<img src="../../image/signature.png" id="signature"alt="certificat">
</div>
<div class="ligne-footer"></div>

</div>
<div class="retour_telecharger">

<a href="contenu.php" class="retour">retour</a>
<button id="btn_certificat" onclick="genererCertificat()">télécharger </button>
</div>
<?php 
  $db=null;
} 
else{ ?>

<div  id="mon_cerificat">
  
  <div class="header_certificat">
  
    <p class="titre_certificat">CERTIFICAT </p>
    <div class="header_ligne_flex">
    <div class="ligne_header"></div>
    <P>Ethique Biomédicale</P>
 <div class="ligne_header"></div>
    </div>
    <div class="ligne_flex">
    <div class="ligne1"></div>
    <div class="ligne2"></div>
    </div>
  </div>
<div class="body_certificat">
<div class="nom_flex">
<p class="name_c">malika</p><p class="majiscule">ouadoud</p>
</div>
<div class="infogeneral">
<p>né(e) le 26/05/2000</p>
<p>a terminé avec succès le cours, aussi validé et obtenu le certificat :</p>
  <p class="titre">Ethique Biomédicale</p>
</div>
<div class="image_flex">
<img src="../../image/c2.png" alt="certificat">
<div id="p">
<p>certificat numéro n°549173012,</p>
<p>24 juin 2022</p>
</div>



</div>
<img src="../../image/signature.png" id="signature"alt="certificat">
</div>
<div class="ligne-footer"></div>

</div>

<?php }

} ?>
<script src="script.js"></script>