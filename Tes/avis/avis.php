

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="avis.css">
    <script src="https://kit.fontawesome.com/84ea18e375.js" crossorigin="anonymous"></script>

    <title>Avis</title>
</head>
<body>
<?php


session_start();


 $_SESSION['pageHome']='avis';

include '../header/header.php';
?>

<div  style="background-color: rgb(230, 229, 229) " class="avis-container">
  <div class="donner-avis">  <h3>Quelle note attribuez-vous à cette formation ?</h3>
     <br>
     
     <span style="margin-left:20px;">Sélectionnez une note :</span> </div>
    
     <div class="etoiles left">
     <!-- <a href="valeurAvis.php?ID=5"> <i  class="fa-solid fa-star"></i></a>  -->
     <i  class="fa-solid fa-star" onclick="myFunction(1)"  id="1"></i>
     <i  class="fa-solid fa-star" onclick="myFunction(2)" id="2"></i>
     <i class="fa-solid fa-star" onclick="myFunction(3)" id="3"></i>
     <i class="fa-solid fa-star" onclick="myFunction(4)" id="4"></i>
     <i class="fa-solid fa-star" onclick="myFunction(5)" id="5"></i>
     </div>
     <div >

 </div>
 
 <div class="left">

<span style="display: block;margin-bottom:10px">Pourquoi avez-vous donné cette note ? </span>
<form action="valeurAvis.php" method='post'>
<textarea  placeholder="Faites-nous part de votre experience avec cette formation. Correspondait-il à vous attentes ? " name="messageavis"  cols="65" rows="8"></textarea>
     <div class="button">  <input type="submit" value="Sauvgarder" class="sauvg"></div>
     </form>
</div>
</div>
<?php
 require_once("../../db.php");
 $resultat=$db->query("SELECT * FROM avis ORDER BY dateavis DESC");
 if($resultat->rowCount()) {
?>
<div  style="background-color: rgb(230, 229, 229) " class="avis-container">

 <h3> Avis:</h3>
<!-- user1******************* -->
    <?php 
    
     while($article=$resultat->fetch(PDO::FETCH_OBJ)){
     $valeuravis=$article->valeuravis;
    $messageavis=$article->messageavis;
    $dateavis=$article->dateavis;
    $id=$article->id;
    $admin=$article->admin;
    if($admin==0){
      $resultat2=$db->query("SELECT * FROM users where id=$id");
      $exist =$resultat2->rowCount();
     if($exist){
      $article2=$resultat2->fetch(PDO::FETCH_OBJ);
      $prenom=$article2->prenom;
      $nom=$article2->nom;
      $photoProfil=$article2->photoProfil;
    
     }
    }

   else{
    $resultat2=$db->query("SELECT * FROM admins where id=$id");
    $exist =$resultat2->rowCount();
   if($exist){
    $article2=$resultat2->fetch(PDO::FETCH_OBJ);
    $prenom=$article2->prenom;
    $nom=$article2->nom;
    $photoProfil=$article2->photoProfil;
   }
    
  }
    ?>
 <div class="user"> 
     <?php
     if($photoProfil=='vide.jpg'){
     ?>
     <!-- <div class="profil">OD</div>  -->
     <div class="profil">
       
       <div class="nom_flex">
      <p class="majiscule"><?php echo substr($_SESSION['nom'], 0, 1);?></p>
      <p class="majiscule"><?php echo substr($_SESSION['prenom'], 0, 1);?></p>
      </div>
          </div> 
   <?php } 
   else{
    if($admin==0){
      ?>
       <img src="../../photoProfil/<?php echo $photoProfil;?>" class="photoProfil" />
      <?php
    }
    else{?>
    <img src="../../admin/photoProfilFormateur/<?php echo $photoProfil;?>" class="photoProfil" />
    <?php

    }
    } 
   ?>
     <div class="details">
      <span class="name"><?php echo $prenom." ".$nom; ?></span>
    <div class="etoiles-user"> 
        <?php for($j=1;$j<6;$j++){
      ?>
    <i class="fa-solid fa-star <?php 
    if($j<=$valeuravis){ echo 'active';}
    ?>"></i>
    <?php   } ?>
    <span class="date" >
        <!-- il y a 2 mois -->
        <?php echo $dateavis;?> </span>     
     </div>
    <span class="description"> <?php echo $messageavis; ?></span>
</div>
</div>
<hr>
<?php }} 
 $db=null;
?>
</div>
<script src="avis.js"></script>
</body>
</html>