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

    <link rel="stylesheet" href="./style.css">
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
    require_once("../db.php");
    ?>
<body class="<?php if( $_SESSION['dark']==1){echo 'dark-theme-variables'; } ;?>">


    <div class="container">
        <aside>
           <div class="top">

               <div class="logo">
                     <img class="img" src="./asserts/logo.png"> 
                     <!-- <h2> Ethique <br><span class="danger" style="color:#6fa9a5;">Biomédicale</span></h2> -->
                     <h2 style="color:#6fa9a5;margin:auto" >CERBO</h2>
                </div>
                <div class="close" id="close-btn">
                     <span class="material-icons-sharp">close</span>
                </div>
            </div>
                <div class="sidebar">
                    <a href="#" class="active" >
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
                    <a href="messages.php">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3>Messages</h3>
                        <span class="message-count">
                        <?php
                          
   
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
                    </a>
                    <a href="../deconnection.php">
                        <span class="material-icons-sharp">logout</span>
                        <h3>Déconnexion</h3>
                    </a>
                </div>
        </aside>
     <!-- ---------------------- END OF ASIDE -------------------------- -->

 
        <main>
            <h1>Tableau de Bord</h1>

            <div class="insights" >
                <div class="condidats">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                         <h3>Totale des candidats</h3>
                         <h1><?php
                         $resultat=$db->query("SELECT * FROM table1");
                         $totaleCondidat =$resultat->rowCount(); 
                        echo  $totaleCondidat;
                         ?></h1>
                        </div>
                        <div class="progress">
                         <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                         </svg>
                         <div class="number">
                            <!-- on peut calculer la moyenne de chapitre lire -->
                            <p>100%</p>
                         </div>
                       </div>
                   </div>
                   <br>
                </div>
                
                <!-- ------------------- END CONDIDATS ----------------------- -->
            
                <div class="certifiers">
                    <span class="material-icons-sharp">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                        <h3>Totale des non certifiés</h3>
                        <h1><?php
                        $resultat=$db->query("SELECT * FROM table1 WHERE certificat=0");
                        $nonCertifie =$resultat->rowCount();
                        if($totaleCondidat){
                        $valeur_cent=($nonCertifie*100)/$totaleCondidat;}
                        else{
                            $valeur_cent=0;
                        }
                        echo  $nonCertifie;

                        ?></h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <!-- on peut calculer la moyenne de chapitre lire -->
                            <p><?php echo number_format($valeur_cent, 2, ',', ''); ?>%</p>
                        </div>
                    </div>
                </div>
                </div>  
                
                <!-- ------------------- END CERTIFIERS----------------------- -->
                
                <div class="non-certifiers">
                    <span class="material-icons-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3> Totale des certifiés</h3>
                            <h1><?php
                            $certifie=$totaleCondidat-$nonCertifie;
                        if($valeur_cent){
                        $valeur_cent2=100-$valeur_cent;
                        }
                        else{
                            $valeur_cent2=0;
                        }
                        echo  $certifie;
                            ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                             </svg>
                            <div class="number">
                            <!-- on peut calculer la moyenne de chapitre lire -->
                               <p><?php echo number_format($valeur_cent2, 2, ',', ''); ?>%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ------------------- END NON CERTIFIERS ----------------------- -->
            </div>
            <!----------------- END OF INSIGHTS --------------- -->
            <div class="recent-demands">
                <h2>demandes récentes</h2>
                <?php
                 $resultat=$db->query("SELECT * FROM users where accepte=false ORDER BY id DESC");
                 if($resultat->rowCount()) {
                     ?>
                <table >
                    <thead>
                        <tr>
                            <th>Nom & Prénom</th>
                            <th id="th2"> Email</th>
                            <th  id="th3"> Etablissement</th>
                           
                            <th  class="th4">Spécialité</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                   
                    $nbr=0;
                    while($article=$resultat->fetch(PDO::FETCH_OBJ) and $nbr<5){
                        $nbr++;
                        $id= $article->id;
                     ?>
                        <tr id="<?php  echo $id;?>">
                            <td><?php echo $article->prenom." ".$article->nom;?></td>
                            <td><?php echo $article->email;?></td>
                            <td class="td3"><?php echo $article->etablissement;?></td>
                            <td class="td4"><?php echo $article->specialite;?></td>
                           <td>  <p class="success"  onclick="accepterUser(<?php  echo $id;?>)" >Accepté</p></td>
                            <td>  <p class="warning "  onclick="refuserUser(<?php  echo $id;?>)" >refusé</p></td>
                        </tr>
                       
                        <?php }?>    
                    </tbody>
                </table>
                <?php if($nbr>4) {?>
                <a href="demandes.php">Afficher tout</a>
               
            <?php
                }
            }
                       else{
                           echo "pas de demandes";
                       }?>
                
              
               
              
            </div>
          </main>
          <!-- --------------------- END OF MAIN ------------------------- -->
         <div id="right-gap" class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                   <span class="material-icons-sharp <?php if( $_SESSION['dark']==0){echo 'active';} ; ?>" >light_mode</span>
                    
                    <span class="material-icons-sharp <?php if( $_SESSION['dark']==1){echo 'active';} ;?>"  >dark_mode</span>
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
                        <img src="photoProfilFormateur/<?php echo   $_SESSION['photoProfil']; ?>" style="height:40px">
                    </div>
                </div>
            </div>
            <!-- ------------------- END OF TOP ----------------------- -->
            <div class="recent-updates">
                <h2>Candidats Admis</h2>
                <div class="updates">

                <!-- ---- php ----- -->
                    
                 <?php 

                    
                        $resultat=$db->query("SELECT * FROM users where accepte=true");

                        if($resultat->rowCount()) {
                        $nbr=0;
                        while($article=$resultat->fetch(PDO::FETCH_OBJ ) and $nbr<3){
                            $nbr++;
                    ?>

                    <div class="update">
                        <div class="profile-photo">
                        <?php
                     $photo=$article->photoProfil;
                     $chemin='../photoProfil/'.$photo;
                     ?> 
                            <img src="<?php echo $chemin;?>" style=" width: 40px;height: 40px;border-radius: 50%;">
                        </div>
                        <div class="message">
                            <p><b><?php  echo  $article->nom; ?> <?php echo $article->prenom; ?></b> <br> <?php  echo  $article->email; ?> </p>                        </div>
                    </div>

                    <?php    } ?>
                    </div>
               
                
                    <?php if($nbr>2){?>
                    <a href="condidats.php">Afficher tout</a> 
            <?php }}
            
             
                     
                     else {
                       echo "Pas de condidats.";
                    }  
                    
                    ?>
            </div>
            <!-- ------------------- END OF RECENT UPDATES ---------------------- -->
            <div class="formation-analytics">
                <h2>Messages</h2>

            <!-- ----------- php ----------- -->
            <?php
                   $resultat=$db->query("SELECT * FROM messages");

                   if($resultat->rowCount()) {
                   $nbr=0;
                   while($article=$resultat->fetch(PDO::FETCH_OBJ ) and $nbr<3){
                       $nbr++;
              ?>

                <div class="item online">
                    <div class="icon">
                        <span class="material-icons-sharp">mail_outline</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3><?php   echo $article->nom; ?> <?php  echo $article->prenom; ?></h3>
                            <small class="text-muted"><?php  echo $article->message; ?></small>
                        </div>
                    </div>
                </div>

                <?php
                  } 
     if($nbr>2){?>
 <a href="messages.php" >Afficher tout</a>
                    <?php  }}
                      else {
                        echo "Pas de messages.";
                    }
                    
                ?>

              
            </div>
           
        </div>
    </div>
    
    <?php 
$db=null;
}?>
    <script src="./Js/index.js"></script>
</body>
</html>