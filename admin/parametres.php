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
      <!-- STYLESHEET -->

      <link rel="stylesheet" href="./asserts/css/communStyle.css">
      <link rel="stylesheet" href="./asserts/css/parametre.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

    <?php
    session_start();
    if(!isset($_SESSION['email'])){
    header("Location:../accueil/accueil.php"); 
 
    }
    else{
        if($_SESSION['Admin']==0){
            header("Location:../accueil/accueil.php"); 
     
        }
        ?>
        <body class="<?php if( $_SESSION['dark']==1){echo 'dark-theme-variables'; } ;?>">
    <div class="container">
        <aside>
           <div class="top">

               <div class="logo">
               <img class="img" src="./asserts/logo.png"> 
               <h2 style="color:#6fa9a5;margin:auto" >CERBO</h2>
                </div>
                <div class="close" id="close-btn">
                     <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                    <a href="index.php"  >
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Tableau de Bord </h3>
                    </a>
                    <a href="../tes/contenu/contenu.php">
                        <span class="material-icons-sharp">home</span>
                        <h3>Home </h3>
                    </a>
                    <a href="condidats.php"   >
                        <span class="material-icons-sharp">person_outline</span>
                        <h3 >Candidats</h3>
                    </a>
                    <a href="demandes.php">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3>Demandes</h3>
                    </a> 
                    <a href="cours.php">
                        <span class="material-icons-sharp">auto_stories</span>
                        <h3>Les cours</h3>
                    </a>    
                    <a href="examen.php">
                        <span class="material-icons-sharp">library_books</span>
                        <h3>Examen</h3>
                    </a>   
                    <a href="messages.php" >
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3>Messages</h3>
                        <span class="message-count">
                        <?php
                            require_once("../db.php");
   
                            $resultat=$db->query("SELECT * FROM  messages");
                            $res =$resultat->rowCount();
                                echo $res;
                        ?>
                        </span>
                    </a>
                    <a href="#" class="active">
                        <span class="material-icons-sharp">settings</span>
                        <h3>Paramètres</h3>
                    </a>
                    <a href="../deconnection.php">
                        <span class="material-icons-sharp">logout</span>
                        <h3>Déconnexion</h3>
                    </a>
                </div>
        </aside>
     <!-- ---------------------- END OF ASIDE -------------------------- -->

        <main>
     <h1> Paramètres </h1>
     <div id="right-gap" class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                   <span class="material-icons-sharp active">light_mode</span>
                    
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey , <b>
                        <?php
                       
      
                         $resultat = $db->query("SELECT * FROM admins ");
                          $article=$resultat->fetch(PDO::FETCH_OBJ);
                          echo   $article->prenom;
                         ?>
                        </b></p>
                        <small class="text-muted" >Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="photoProfilFormateur/<?php echo   $_SESSION['photoProfil']; ?>">
                    </div>
                </div>
            </div>
            <!-- ------------------- END OF TOP ----------------------- -->
            <p class="titre1" style="margin-top: 20px;">Modifier mon profil</p>
        <div class="body">

         <div class="box-parametre">
            <?php
           
            $resultat = $db->query("SELECT * FROM admins ");
            $article=$resultat->fetch(PDO::FETCH_OBJ);
            ?>

            <form id="form-modifier_formateur" action="" method="POST"  enctype="multipart/form-data">
            <div class="image_position">
                <img src="photoProfilFormateur/<?php echo   $_SESSION['photoProfil']; ?>" id="photoProfilActuelle" alt="photoProfil" >
                <div class="div-icon" >
                    <i class="fa fa-camera icon_pos"></i>
                </div>
                <input type="file" onchange="readURL(this)" name="photoProfil"  id="image">

            </div>
            <div class="erreur"  id="photo_erreur"></div>
            <div class="erreur"  id="photo_erreur2"></div>
               <input type="text" name="nom" id="nomA" placeholder="nouveau nom" value="<?php  echo   $article->nom;?>" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">
               <div class="erreur"  id="nom_erreur"></div>
               <input type="text" name="prenom" id="prenomA" placeholder="nouveau prenom" value="<?php  echo   $article->prenom;?>"class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>" >
               <div class="erreur"  id="prenom_erreur"></div> 
               <input type="email" name="email" id="emailA" placeholder="email" value="<?php  echo   $article->email;?>" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">
               <div class="erreur"  id="email_erreur"></div>   
               <input type="password"  id="passwordA" name="password" placeholder="nouveau mot de passe" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">
               <div class="erreur"  id="password_erreur"></div>
               <input id="sauvegarder" type="submit" value="Modifier">

             </form>
             <p id="erreur"></p>

        </div>
      
        </div>
        <?php
        
        ?>
        <div class=" <?php if( $_SESSION['formateur']==1) echo 'section_ajouter_formateur'; ?>">
        <p class="titre1" style="margin-top: 20px;">Ajouter un autre formateur</p>
<!-- ajouter autre formateur ***************************** -->
    <div class="body">
        <div class="box-parametre">
                <form id="form-ajouter-formateur" action="" method="POST" enctype="multipart/form-data">
                    <!-- photoProfil -->
                    <div class="image_position">
                            <img src="./asserts/img.png" id="photoProfilFormateur" alt="photoProfil" >
                            <div class="div-icon" >
                                <i class="fa fa-camera icon_pos"></i>
                            </div>
                            <input type="file" onchange="readURL2(this)" name="photoProfilFormateur" id="image">

                    </div>
                    <div class="erreur"  id="photoFormateur_erreur"></div>
                <input type="text" id="nomF" name="nomFormateur" placeholder="nom" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">
                <div class="erreur"  id="nomFormateur_erreur"></div>
                <input type="text" id="prenomF" name="prenomFormateur" placeholder="prenom" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">
                <div class="erreur"  id="prenomFormateur_erreur"></div>
                <input type="email" id="emailF" name="emailFormateur" placeholder="email" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>" >
                <div class="erreur"  id="emailFormateur_erreur"></div>
                <input type="password" id="passwordF" name="passwordFormateur" placeholder="mot de passe" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>" >
                <div class="erreur"  id="passwordFormateur_erreur"></div>
                <input id="sauvegarder" type="submit" value="Ajouter" >
                
                </form>
                <p id="erreur"></p>
        </div>  
    </div>
    <!-- fin================================= -->
    <div> 
        <p class="titre1" style="margin-top: 20px;">Liste des formateurs</p>


        <div class="recent-demands">
             <?php  
                    $resultat=$db->query("SELECT * FROM admins where formateur='1' ");
                    if($resultat->rowCount()) {?>
                
                <table>
                    <thead>
                        <tr>
                            <th>Nom & Prénom</th>
                            <th> Gmail</th>
                            <th>Statuts</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                  
                   
                    while($article=$resultat->fetch(PDO::FETCH_OBJ) ){
                        
                        $id= $article->id;
                     ?>
                        <tr id="<?php  echo $id;?>">
                            <td><?php echo $article->prenom." ".$article->nom;?></td>
                            <td><?php echo $article->email;?></td>
                         <td>  <p  class="danger"  onclick="supprimerFormateur(<?php  echo $id;?>)" >Supprimer</p></td>
                        </tr>
                       
                       <?php }}
                       else{
                           echo "pas de Formaturs ";
                       }?>
                    </tbody>
                </table>
             
            </div>



    </div>
<!-- fin body++++++++++++====++ -->
</div>
<br><br>
    </div>
</main>
 </div>
    <?php
$db=null;
} ?>
    <script src="./Js/index.js"></script>
    <script src="./Js/parametres.js"></script>
    <script src="./Js/modifierFormateur.js"></script>

</body>
</html>