

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contenu.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Contenu de le formation</title>
	<script src="https://kit.fontawesome.com/84ea18e375.js" crossorigin="anonymous"></script>
	<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<?php
	
	session_start();

 $_SESSION['pageHome']='contenu';

include '../header/header.php';
	?>
 <div class="grandContenu">
   <div class="contenu2">
        <?php 
		 include "../../db.php";
		 $resultat=$db->query("SELECT * FROM pdf");
		 $count =$resultat->rowCount();
        $i = 1;
        while($i<= $count && $article=$resultat->fetch(PDO::FETCH_OBJ)){ 
	 $nom=$article->nom;
     $id=$article->nom;
	 $description =$article->description;
     $redirection='redirection.php?name='.$nom;
			 ?>
             
			<div class="cours">
            <div class="triangle"></div> 
           <div class="liste-cour">   
	       <div class="cours">
            <p class="titre"><?php echo $nom;?></p>
          
            <div class="a"> <a class='lien-download' href=<?php echo $redirection;?>><i class='bx bxs-download'></i><span class="download">télécharger</span></a></div>
            </div>
            <span class="description"><?php echo $description ?></span>
    
            </div>
		</div>
     
        <?php
           $i++;
        }
		$db=null;
        ?>
        <div>
        <div class="btnExam"><a  class="passerTest" href="<?php  if($_SESSION['valider']==true) { echo "examValide.php"; } else { echo "commencerTest.php";} ?>">  Passer le test</a></div>	
        <!-- <div class="btnExam"><a  class="passerTest" href="./firstExam.php"> Passer le test</a></div>    -->
    </div>
		   	<!-- SIDEBAR -->
	  <div id="sidebar">	</div> 
	   <!-- SIDEBAR -->
  	</div>
</body>
<script src="script.js"></script>

</html>