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

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <!-- ajouter -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


<!-- <LINK href="style/ajouterCours.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="./asserts/css/communStyle.css">  
    <link rel="stylesheet" href="./asserts/css/demandes.css">
    <link rel="stylesheet" href="./asserts/css/ajouterCours.css">  

 


</head>


<?php
 session_start();
if(!isset($_SESSION['email'])){
    header("Location:../accueil/accueil.php"); 
 echo 'mmmm';
}
else{
    if($_SESSION['Admin']==0){
       header("Location:../accueil/accueil.php"); 
 
    }

    require_once("../db.php");
    // include "ajouterCours.php";
    ?>
    <body class="<?php if( $_SESSION['dark']==1){echo 'dark-theme-variables'; } ;?>">
    <div class="container">
        <aside>
           <div class="top">

               <div class="logo">
                     <!-- <img class="img" src="./asserts/logo_prev_ui.png">  -->
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
                    <a href="demandes.php">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3>Demandes</h3>
                    </a> 
                    <a href="#" class="active">
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
                    <a href="../deconnection.php">
                        <span class="material-icons-sharp">logout</span>
                        <h3>Déconnexion</h3>
                    </a>
                </div>
        </aside>
     <!-- ---------------------- END OF ASIDE -------------------------- -->
     <main>
         
         <h1 class="titre">Les cours</h1>  
         
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


          


    <div class="div-ajout">
                  <form action="" method="post" enctype="multipart/form-data">
    <div>
    <label class="label-style" for="titre">le titre du cours:</label>
    <input  placeholder="  saisissez..." style="margin-left:55px; width:180px; border:2px solid black; border-radius: 5px;height:25px " type="text" name="titre">
    </div>
  
  
      <div  style="margin-top:10px" class="button-wrap">
        <label class="label-style" class="button" for="upload">Séléctionnez un fichier:</label>
        <input  style="width:400px;" id="upload" name='photoProfil' type="file">
      </div>
 
        
  
<div style="width : 300px; text-align: center;">
<input  style ="
margin: 10px auto;
width: 100px;
    height: 25px;
    border: 1px solid #6fa9a5;
    color: #6fa9a5;
    cursor: pointer; 
    background-color: var( --color-info-light);
    text-transform: uppercase;
    font-weight: 600;
    border-radius: 49px;
    transition: 0.5;" id="enregitrer" type="submit" value="enregister">
</div>

</form>
</div>

<!-- fin du ficheir ajouter fichier  -->
</body>
</html>

<?php
 
 
    if (isset($_FILES['photoProfil']) and isset($_POST['titre']) ) {
        if(!empty($_POST['titre']) and !empty($_FILES['photoProfil']['name'])){
            $titre=$_POST['titre'];
        $tailleMax = 20971525555555;

        $extensionValide = 'pdf';
        if ($_FILES['photoProfil']['size'] <= $tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['photoProfil']['name'], '.'), 1));

            if ($extensionUpload== 'pdf') {
				$chemin = 'MesFichiers/' . $titre. '.' . $extensionUpload;;
                $resultat = move_uploaded_file($_FILES['photoProfil']['tmp_name'], $chemin);

                if ($resultat) {

                   
                 
                } else {
                    $msg = "erreur pendant l'importation de fichier";
                }
            }
			 else {
            
               echo "s'il vous plait entrer le fichier sous format pdf";
            }
        } else {
           echo 'votre fichier ne doit pas etre depasse 2mo';
        }
        $prenom=$_SESSION['prenom'];
        $nom=$_SESSION['nom'];
        $formateur=$prenom.' '.$nom;
        $date= date("Y-m-d H:i:s");
       
        $statement=$db->prepare("INSERT INTO pdf(nom,formateur,date)VALUES(:titre,:formateur,:date)");
        $statement->execute([
           
            "titre"=>$titre,
            "formateur"=>$formateur,
            "date"=>$date,
           
         
        ]);
    }
    else{
        echo "<p style='color:red;'>s'il vous plait remplir tous les champs<p>";
    }}
	

?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

            

 <main>

<div class="recent-demands">

<p class="titre1">Ajouter un cours</p>
<div class="div_ajouter_cours">


<form action="" method="post" id="form-ajouter-cours" enctype="multipart/form-data">
    <div >
    <label >le titre du cours</label>
    <input type="text" name="titre" id="titreCours" placeholder="titre" class="input_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>"  >
   <p class="erreur" id="titre_erreur"></p>
</div>
  
    
    <div >
    <label >description</label>
    <textarea name="description" id="descriptionCours" placeholder="description" cols="30" rows="6" class="input_dark_id <?php if( $_SESSION['dark']==1){echo 'input_dark'; } else echo 'input_light';?>"></textarea>
    <p class="erreur" id="description_erreur"></p>
    </div>
    <div class="container_file">
      <div class="button-wrap" >
        <input id="fileCours"  name='coursFile' type="file" style="width:600px">
      </div>
      <p class="erreur" id="file_erreur"></p>
    </div>
<div class="div_flex">
<input type="submit" value="Enregister">
</div>

</form>
</div>
<p class="titre2">Tous les cours</p>

    <?php  
                    $resultat=$db->query("SELECT * FROM pdf ORDER BY date DESC" );
                    if($resultat->rowCount()) {?>
                
                <table style="margin-top: 10px;">
                    <thead>
                        <tr>
                        
                            <th>titre</th>
                            <th > formateur</th>
                            <th > date</th>
                           
                            <th>nombre de téléchargement</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                  
                   
                    while($article=$resultat->fetch(PDO::FETCH_OBJ) ){
                        
                        $id= $article->id;
                     ?>
                        <tr id="<?php  echo $id;?>">
                            <td><?php echo $article->nom;?></td>
                            <td><?php echo $article->formateur;?></td>
                            <td ><?php echo $article->date;?></td>
                            <td ><?php echo $article->vu;?></td>

                            <td>  <p class="warning supprimer-cours"  onclick="supprimerCours(<?php  echo $id;?>)" >supprimer</p></td>
                        </tr>
                       
                       <?php }}
                       else{
                           echo "pas de cours";
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

   
     <!-- <script src="./index.js"></script> -->
     
   <script src ="../admin/Js/script.js"></script>

    <script src="./Js/index.js"></script>

</body>
<?php
$db=null;
}?>

</html>
