<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Admin</title>
    <!-- ----------- la biblio chartjs ---------- -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- material icon  -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
      <!-- STYLESHEET -->

    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="./asserts/css/communStyle.css">
</head>
<body>

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
                        <h3>Table de Bord </h3>
                    </a>
                    <a href="../tes/contenu/contenu.php">
                        <span class="material-icons-sharp">home</span>
                        <h3>Home </h3>
                    </a>
                    <a href="condidats.php"   >
                        <span class="material-icons-sharp">person_outline</span>
                        <h3 >Condidats</h3>
                    </a>
                    <a href="cours.php">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3>Les cours</h3>
                    </a>                    
                    <a href="#" class="active">
                        <span class="material-icons-sharp">insights</span>
                        <h3>Statistiques </h3>
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
                        <h3>Paramétres</h3>
                    </a>
                    <a href="../deconnection.php">
                        <span class="material-icons-sharp">logout</span>
                        <h3>Déconnexion</h3>
                    </a>
                </div>
        </aside>
     <!-- ---------------------- END OF ASIDE -------------------------- -->
     <main>
         <br> 
         <br>
     <h1> Statistiques</h1>
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
                        <img src="./asserts/img.png">
                    </div>
                </div>
            </div>
            <!-- ------------------- END OF TOP ----------------------- -->


            <!-- ---------------- creation de graphe ------------------- -->
                            <!-- ------  PHP    ------ -->
                            <?php 
                         
                            $resultat=$db->query("SELECT * FROM  table1");
                            $total =$resultat->rowCount();
                            $resultat0=$db->query("SELECT * FROM  table1 WHERE formation0=1");
                            $f0 =$resultat0->rowCount();
                            $resultat1=$db->query("SELECT * FROM  table1 WHERE formation1=1");
                            $f1 =$resultat1->rowCount();
                            $resultat2=$db->query("SELECT * FROM  table1 WHERE formation2=1");
                            $f2 =$resultat2->rowCount();
                            $resultat3=$db->query("SELECT * FROM  table1 WHERE formation3=1");
                            $f3 =$resultat3->rowCount();
                            $resultat4=$db->query("SELECT * FROM  table1 WHERE formation4=1");
                            $f4 =$resultat4->rowCount();
                            $resultat5=$db->query("SELECT * FROM  table1 WHERE formation5=1");
                            $f5 =$resultat5->rowCount();
                            $resultat6=$db->query("SELECT * FROM  table1 WHERE formation6=1");
                            $f6 =$resultat6->rowCount();
                            $resultat7=$db->query("SELECT * FROM  table1 WHERE certificat=1");
                            $certificat =$resultat7->rowCount();
                            
                           
  
                    ?>

             <div id="chart_div" style=" width:100%"></div>
            <br/>
            <div>
               <p> les Condidats certifiés : <?php echo $certificat; ?></p>
                <br>
                <br>
                <p>L'examen est bloquer pour : 
                    <?php
                
                    $totaleCondidats=0;
                      $resultat=$db->query("SELECT * FROM  table1 WHERE notValide>2 ");
                      while($article=$resultat->fetch(PDO::FETCH_OBJ)){
                        $time= $article->time;
                        $timeuser=strtotime($time);
                        $timeuser_plus_mois=strtotime('+1 month',$timeuser);
                        $timeuser_plus_mois_format=date('Y-m-d',  $timeuser_plus_mois);
                        $datenow=new DateTime();
                        $now=$datenow->format('Y-m-d');
                        if(  $now< $timeuser_plus_mois_format){
                           $totaleCondidats+=1;
                        }
                      
                        }
                        echo $totaleCondidats;

                    ?>
                </p>

            </div>
        </div>

   
   

  
     </main>

    </div> 
    <script>
    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Chapitres', ' lu par', "n'est pas lu par"],
          ['chapitre0', <?php echo $f0; ?>, <?php echo ($total -$f0); ?>],
          ['chapitre1',  <?php echo $f1; ?>, <?php echo ($total -$f1); ?>], 
          ['chapitre2',  <?php echo $f2; ?>, <?php echo ($total -$f2); ?>],
          ['chapitre3',  <?php echo $f3; ?>, <?php echo ($total -$f3); ?>],
          ['chapitre4',  <?php echo $f4; ?>, <?php echo ($total -$f4); ?>],
          ['chapitre5',  <?php echo $f5; ?>, <?php echo ($total -$f5); ?>],
          ['chapitre6',  <?php echo $f6; ?>, <?php echo ($total -$f6); ?>],
        ]);

        var options = {
          chart: {
            title: "Le nombre des Condidats qui sont lire , et qui ne sont pas lire chaque chapitre ",
            subtitle: ' ',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#c782d0', '#41f1b6']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        
      }
    </script>
    
    </div>
    <script src="./Js/index.js"></script>
</body>
</html>
<?php 
$db=null;
}?>