    <link rel="stylesheet" href="../header/style.css">
   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Contenu de le formation</title>
	<script src="https://kit.fontawesome.com/84ea18e375.js" crossorigin="anonymous"></script>
	<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  
    <?php


if(!isset($_SESSION['email'])){
    header("Location:../../accueil/accueil.php"); 
 
}
else{?>
   <nav>
  
       <div class="container">
           <!-- <div class="logo"><img src="../header/logo.svg" alt="logo"> -->
           <div class="logo"><img src="../header/logo.jfif" alt="logo">
           <h1 class="title">   CERBO</h1></div>
           <div class="menu">
            <?php
            if($_SESSION['Admin']==1){ ?>
           <div class="lien"><i class='fas fa-street-view' style="font-size: 21px; margin-bottom :2px ;color:#bf80c7;"></i><a href="../../admin/index.php">Page Admin</a></div>
          <?php  }
            ?>
         
               <div class="lien"><i style="font-size: 21px; margin-bottom :2px ;color:#bf80c7;" class="material-icons " >home</i><a href="../../accueil/accueil.php">Accueil</a></div>

               <div class="lien"><i style="font-size: 19px; color:#bf80c7" class="material-icons " >message</i><a href="../contacter/contacterNous.php" >Contactez-nous</a></div>
               <div id= "param" class="lien settings"><i style="font-size: 21px; margin-bottom :2px; color: #bf80c7" class="material-icons " >settings</i>
               <a  href="#">Paramètre</a>  <i  style="color:#bf80c7" id="i" class='bx bx-chevron-down'></i><i id="chevron-up" style="display: none" class='bx bx-chevron-up'></i>
              
            </div>
            <a href="../../monProfile.php">   
            <?php
     if($_SESSION['photoProfil']=='vide.jpg'){
     ?>
    
     <div class="profil">
       
       <div class="nom_flex">
      <p  class="majiscule"><?php echo substr($_SESSION['nom'], 0, 1);?></p>
      <p class="majiscule"><?php echo substr($_SESSION['prenom'], 0, 1);?></p>
      </div>
          </div> 
   
     
   <?php } 
   else{
    if( $_SESSION['Admin']==0){?>
  <img src="../../photoProfil/<?php echo $_SESSION['photoProfil'];?>" class="photoProfil" />

   
     <?php } 
     else { 
        ?>
        <img src="../../admin/photoProfilFormateur/<?php echo $_SESSION['photoProfil'];?>" class="photoProfil" />

   <?php  }}
   ?> 
     </a>
    </div>    
           <button class="btnn">
               <span></span>
               <span></span>
               <span></span>
           </button>

           
        
    </div>

<!-- *list************************************************************ -->
<div id="menu" class="petit_menu ">
<ul id="ul">
    <div class="menu-option">
    <li><i class='bx bxs-edit'></i><a href="../../monProfile.php"><span >Modifier Profil</span></a></li>
    
    </div>
  
    <hr>
    
    <div class="menu-option">
        <li><i class='fas fa-sign-out-alt'></i><a href="../../deconnection.php" ><span >Déconnexion</span></a></li>
    </div>
</ul>

</div>



   <!-- *list************************************************************ -->


   <!-- drop down menu  -->

         <div class="hidden drop-down">
        <div class="li"> <i style="font-size: 21px; margin-bottom :2px ;color:#bf80c7;" class='fas fa-street-view' ></i><a href="../../admin/index.php">Page Admin</a></div>    
        <hr size>
        <div class="li"> <i style="font-size: 21px; margin-bottom :2px ;color:#bf80c7;" class="material-icons " >home</i><a href="../../accueil/accueil.php">Accueil</a></div>
                <hr size>
               <div class="li"><i style="font-size: 19px; color:#bf80c7" class="material-icons " >message</i><a href="../contacter/contacterNous.php" >Contactez-nous</a></div>
               <hr>
               <div class="li"> 
                <i style =" color: #bf80c7;font-size: 21px;"class='bx bxs-edit'></i><a href="../../monProfile.php">Modifier Profile</a></li> 
                 </div>
                    <hr>
                 <div class="li">
                <i style =" color: #bf80c7;font-size: 21px;" class='fas fa-sign-out-alt'></i><a href="../../deconnection.php" >Deconnection</a></li>
                </div>
           </div>

   <!-- drop down menu  -->
       <div class="middle-container">
           <h1>Ethique Biomédicale</h1>
           <h4>apprennez à soigner</h4>
           <div class="contenu">
               <ul class="links">
               <li id ="li"  class="<?php if($_SESSION['pageHome']=='presentation'){echo "encours"; }  ?>" ><a  href="../presentation/presentation.php">Présentation</a></li>
                   <li id="li"  class="<?php if($_SESSION['pageHome']=='contenu'){echo "encours"; }  ?>"><a href="../contenu/contenu.php">Contenu</a></li>
                   
                   <li  id="li" class="<?php if($_SESSION['pageHome']=='avis'){echo "encours"; }  ?>"><a   href="../avis/avis.php">Avis</a></li>
                  
               </ul>
           </div>

       </div>
   </nav> 
   <?php } ?>
<script src="../header/header.js"></script>
