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
                    <a href="index.php" >
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
                    <a href="#" class="active">
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
        
         <h1 class="titre">Examen</h1>
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

<!-- <form class="temps" method="post" action="">
    <label for="temps">Veuillez saisir le nombre de minutes pour l'examen</label>
    <input type="number" name="temps" value="25">
    <span>min</span>
    <input type="submit" value="Enregistrer" >
    <p class="faux"></p>
</form> -->
<!-- ========================================== -->
<p class="titre1" style="margin-top: 20px;">informations générales sur l'examen</p>
        <div class="div_ajouter_cours" style="padding-top:10px">

<?php
      $resultat=$db->query("SELECT * FROM temps");
     
    $article=$resultat->fetch(PDO::FETCH_OBJ);
    $duree=$article->duree;
    $nombreQuestions=$article->nombreQuestions;
        
?>
<form class="temps" method="post" action="">
<div>
<label for="temps">Veuillez saisir la durée d'examen en minutes</label>
    <input type="number" id="temps"  name="temps" value="<?php echo $duree;?>"  class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">
   
</div>
<div>
<label for="temps">Veuillez saisir le nombre de questions pour l'examen</label>
    <input type="number" id="nombreQuestions" name="nombreQuestions" value="<?php echo $nombreQuestions;?>" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">
  
</div>
 <div class="div_flex">
<input type="submit" value="Enregister" style="margin-top:15px">
</div>

</form>
</div>
<p class="faux" style="color:red;text-align:center"></p>
<!-- *************************ajouter question pour l'examen----------- -->
<div class="recent-demands">
            <!-- ajouter une question -->
        <p class="titre1" style="margin-top: 20px;">Ajouter une question pour l'examen</p>
        <div class="div_ajouter_cours" style="padding-top:10px">


<form action="" method="post" id="form-ajouter-question" enctype="multipart/form-data">
<div>
    <label >La question</label>
    <textarea id="question" name="question" rows="2" cols="50" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>"> </textarea>
    <p class="erreur" id="question_erreur"></p>
</div>
    <div>
    <label for="choix1">le 1er choix</label>
    <textarea id="choix1"name="choix1" rows="2" cols="50" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">  </textarea>
    <p class="erreur" id="choix1_erreur"></p>
</div>
    <div>
    <label for="choix2">le 2ème choix  </label>
    <textarea id="choix2"name="choix2" rows="2" cols="50" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>"> </textarea>
    <p class="erreur" id="choix2_erreur"></p>
</div>
    <div>
    <label for="choix3">Le 3éme choix</label>
    <textarea id="choix3"name="choix3" rows="2" cols="50" class= "textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>"> </textarea>
    <p class="erreur" id="choix3_erreur"></p>
 </div>
    <div>
        <div>
            <label for="reponse"> sélectionnez la bonne réponse </label>
            <div class="SelArrBg">
            <select name="reponse" class= "select_style textarea_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>">
            <option value="1">choix 1</option>
            <option value="2">choix 2</option>
            <option value="3">choix 3</option>
            </select>
            <p class="erreur" id="reponse_erreur"></p>
            </div>
        </div>
        <div class="div_flex">
<input type="submit" value="Enregister">
</div>
    </div>
</form>
</div>

        <p class="titre2">Tous les questions</p>




        <?php
        $i=0;
        $resultat=$db->query("SELECT * FROM exam ORDER BY id DESC");
        if($resultat->rowCount()) {
        while($article=$resultat->fetch(PDO::FETCH_OBJ) and $i<4){
        $i++;
        $question=$article->question;
        $choix1=$article->choix1;
        $choix2=$article->choix2;
        $choix3=$article->choix3;
        $id=$article->id;
        ?>
        <div class=" blockQuestion" id="<?php echo $id;?>">
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
   <?php if($i>3) {?>
    <a href="tousQuestions.php" class="afficherTous-exam">Afficher tout</a>
               
            <?php }
 }
 else{
     echo 'pas de question';
 }
            ?>
 </div>
    <?php 
  $db=null;
    }?>
     <script src="./Js/index.js"></script>
     <script src="./Js/ajouterQuestion.js"></script>

</body>
</html>


