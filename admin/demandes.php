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
    <link rel="stylesheet" href="./asserts/css/demandes.css">


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
                    <a href="index.php"   >
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
                    <a href="#" class="active">
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
                    <a href="messages.php">
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
                    <a href="parametres.php">
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
         
         <h1 class="titre">Demandes Récentes</h1>
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
        <main>

            <div class="recent-demands">
             <?php  
                    $resultat=$db->query("SELECT * FROM users where accepte=false");
                    if($resultat->rowCount()) {?>
                
                <table>
                    <thead>
                        <tr>
                            <th>Nom & Prénom</th>
                            <th> Gmail</th>
                            <th> Etablissement</th>
                           
                            <th>Spécialité</th>
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
                            <td><?php echo $article->etablissement;?></td>
                            <td><?php echo $article->specialite;?></td>
                         <td>  <p class="success"  onclick="accepterUser(<?php  echo $id;?>)" >Accepté</p></td>
                            <td>  <p class="warning "  onclick="refuserUser(<?php  echo $id;?>)" >refusé</p></td>
                        </tr>
                       
                       <?php }}
                       else{
                           echo "pas de demandes";
                       }?>
                    </tbody>
                </table>
             
            </div>
        </main>
           
            <style>
                .recent-demands{
                    
                    margin:10px auto;
                    
                }
                table{
                    margin-bottom:40px;
                }
            </style>

    </div>
    <?php
$db=null;
    }?>
     <script src="./Js/index.js"></script>
</body>
</html>