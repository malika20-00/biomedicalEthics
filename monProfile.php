<LINK href="style/monProfile.css" rel="stylesheet" type="text/css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php
session_start();
//require_once("header.php");
if (!isset($_SESSION['email'])) {
    header("Location:accueil/accueil.php");
} 

    else {
    require_once("db.php");
    $nom=$_SESSION['nom'];
    $prenom=$_SESSION['prenom'];
    if(!empty($_SESSION['etablissement']) )  $etablissement = $_SESSION['etablissement'];
  else  $etablissement = "";
  if(!empty($_SESSION['filiere']))   $filiere = $_SESSION['filiere'];
  else  $filiere = "";
  if(!empty($_SESSION['biographie']) )  $biographie = $_SESSION['biographie'];
  else   $biographie = "";    
  if(!empty($_SESSION['date']) )  $date = $_SESSION['date'];
  else   $date = "";  
  if($_SESSION['Admin']==0)  $cheminPhoto = "photoProfil/".$_SESSION['photoProfil'];
  else  $cheminPhoto = "admin/photoProfilFormateur/".$_SESSION['photoProfil'];
    $email = $_SESSION['email'];
    $Password = $_SESSION['password'];
    $photoProfil = $_SESSION['photoProfil'];

?>

    <form action="modifierProfil.php" id="form_profil_user" method="POST" enctype="multipart/form-data">
        <div class="mainProfil">

            <div class="image_position">
                <img src="<?php echo $cheminPhoto; ?>" id="photoUser" alt="photoProfil">
                <div class="div-icon">
                    <i class="fa fa-camera icon_pos"></i>
                </div>
                <input type="file" onchange="readURL(this)" name="photoProfil" id="image">

            </div>    
            <div class="erreur" id="photoErreur" style="text-align:center"></div>

            <p class="nom"><?php echo $prenom." ".$nom;?></p>
          
            <div>
            <div class="input_flex">
                    <div class="zone">
                        <i class="material-icons" style="font-size: 20px;margin:auto;  color: #0c0857e1;">account_box</i>
                        <input type="text" name="nom" id="nomU" placeholder="nom" value="<?php echo  $nom; ?>">
                       
                    </div>
                
                    <div class="zone">
                    <i class="material-icons" style="font-size: 20px;margin:auto;  color: #0c0857e1;">account_box</i>

                        <input type="text" name="prenom" id="prenomU" placeholder="prenom" value="<?php echo  $prenom; ?>">
                    </div>
            </div>
            <div class="input_flex">
               <div class="erreur" id="nomErreur"></div>
               <div class="erreur" id="prenomErreur"></div>
            </div>

                <div class="input_flex">
                    <div class="zone">
                    <i class="material-icons" style="font-size: 20px;margin:auto;  color: #0c0857e1;">email</i>
                        <input type="text" name="email" id="emailU" placeholder="email" value="<?php echo  $email; ?>">
                    </div>
                    <div class="zone">
                        <i class='fas fa-school' style="font-size:18px;margin:auto;  color: #0c0857e1;"></i>

                        <input type="text" name="etablissement" id="etablissementU" placeholder="etablissement" value="<?php echo  $etablissement; ?>">
                    </div>
                </div>
                <div class="input_flex">
               <div class="erreur"  id="emailErreur"></div>
               <div class="erreur" id="etablissementErreur"></div>
            </div>
                <div class="input_flex">
                    <div class="zone">
                    <i class='fas fa-school' style="font-size:18px;margin:auto;  color: #0c0857e1;"></i>
                        <input type="text" name="filiere"  id="filiereU"  placeholder="filière" value="<?php echo  $filiere; ?>">
                        <div style="color:red;font-size:11px;" id="emailP"></div>
                    </div>
                    <div class="zone">
                    <i class="material-icons" style="font-size:18px;margin:auto;  color: #0c0857e1;">date_range</i>
                     <input type="date" placeholder="Date de naissance" name="date" id="date" value="<?php echo $date;?>">
                    </div>
                </div>
                <div class="input_flex">
              
               <div class="erreur" id="filiereErreur"></div>
               <div class="erreur" id="dateErreur"></div>
            </div>
                <div class="input_flex">
                    <div class="zone">
                        <i class='fas fa-user-lock' style="font-size: 18px;margin:auto;  color: #0c0857e1;"></i>

                        <input type="password" name="pwA" id="ancienPwdU" placeholder="ancien mot de passe">
                    </div>
                    <div class="zone">
                        <i class='fas fa-lock' style="font-size:18px;margin:auto;  color: #0c0857e1;"></i>
                        <input type="password" name="pwN" id="nouveauPwdU" placeholder="nouveau mot de passe " name="password">
                    </div>
                </div>
                <div class="input_flex">
                <div class="erreur" id="passwordAncienErreur"></div>
              <div class="erreur" id="passwordNouveauErreur"></div>
           </div>
                <textarea name="biographie" id="biographieU" cols="30" rows="7" placeholder="Mini-biographie"><?php echo  $biographie; ?></textarea>

                <br />
                <input id="inscrir" type="submit" value="Modifier">

            </div>
            <div>
                <div class="clip_back">

                </div>

            </div>
        </div>
    </form>

<?php
 $db=null;
  } ?>

<script src="monProfile.js"></script>
