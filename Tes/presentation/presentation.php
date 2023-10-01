

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="presentation.css">
    <title>Présentation</title>
</head>
<body>
<?php
session_start();

 $_SESSION['pageHome']='presentation';
include '../header/header.php';


?>
<div class="grandContenu">

<div class="presentation">

    <h3 class="head-title">À propos de cette formation</h3>
    <div class="pp">
    <div class="p0"> la faculté de Médecine et de Pharmacie d'Oujda vous offre une cértification en ligne gratuit en éthique biomédicale</div>
    <hr>
    <div class="p1">
        <span class="spans-title">En chiffres</span>
             <div class="details">
             <span>leçons : <?php 
		 include "../../db.php";
		 $resultatt=$db->query("SELECT * FROM pdf");
		 $countCours =$resultatt->rowCount();
          echo $countCours;
         ?>
	</span>
             <span>Participants : <?php $resultat=$db->query("SELECT * FROM users");
		 $count =$resultat->rowCount();
          echo $count;
         ?></span>
             <span>Langue :  Français</span>
             </div>
         </span>
    </div>
    <!-- p1 -->
    <hr>
    <div class="p2">
        <span class="spans-title">Certificats</span>
             <div class="details">
             <span>À la fin de cette formation et si vous réussirez les quizs, vous obtenez un certificat dans le domaine d'éthique biomédicale  </span>
             <button style =" color: white" class="btn-certificat"> <a href="../contenu/certificat.php" > Voir exemple</a>
                </button>
             </div>
         
    </div>
    <!-- p2 -->
    <hr>

    <div class="p3">
        <span class="spans-title">Description</span>
             <div class="details">
             <ul id="p3">Il s'agit d'un cours de niveau débutant, donc ensemble, nous apprendrons les principes fondamentales de l'Ethique biomédicale la base à l'avancée.Afin que vous puissiez appliquer vos compétences acquises dans le domaine médical,dans cette formation, vous apprendrez :

                     <div class="chapitre">
                         <?php  $i=0;
                            while( $i<$countCours && $article=$resultatt->fetch(PDO::FETCH_OBJ)){
                                 $i++;
                            	 $nom=$article->nom;
                                 

                            ?>
                             <li> <span class="nom-cour chap">Chapitre <?php echo $i ?>: </span> <span class="nom-cour cour"><?php  echo $nom ?></span></li>
                       <?php 
                         $db=null;
                                }
                         ?>
                    
                    
                      </div>

             </ul>
             
             </div>
           
         
    </div>

    <!-- <hr>
 <div class="p2">
        <span class="spans-title">Formateurs</span>
             <div class="details">
             <div class="user"> 
                <span class="profil">OD</span> 
                   <span class="name">Derraz Ouissal</span>
                   </div>
       
    <span class="description">Stephen Koel Soren is the founder of an ICT school which is specially for orphan and autistic childrens and youths. Web Design, Web Development, Graphics Design, Software Development, Video Editing, Server Management, Digital Marketing, SEO and Affiliate Marketing, Wordpress is the sector where he providing courses in his ICT School.</span>
     </div>
            
         
    </div>    -->
  <hr>
    <div class="p4">

             <span class="spans-title">CERBO</span>
             <div class="detailss">
                <span>Le CERBO est un comité qui a pour mission d’examiner les questions éthiques 
soulevées par des projets de recherches en y appliquant une approche 
pluridisciplinaire, pour clarifier et résoudre ces problématiques à porter éthique et 
morale. Les membres viennent d’horizons différents et n’ont pas les mêmes 
backgrounds scientifiques et méthodologies ; d’où l’idée de cette certification qui 
permettra de mettre à niveau les connaissances des nouveaux membres qui intègrent 
le CERBO, La plateforme peut être utilisée également pour l’acculturation à la 
Bioéthique et être ouverte au public. </span>
             </div>
             </div>
    </div>
</div>
</div>

</body>
</html>