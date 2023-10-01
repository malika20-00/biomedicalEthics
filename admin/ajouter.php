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
    
                 if ( ( isset($_POST['nom']) && $_POST['nom'] != "" )
                  && ( isset($_POST['prenom']) && $_POST['prenom'] != "" )
                  && ( isset($_POST['email']) && $_POST['email'] != "" )
                  && ( isset($_POST['password']) && $_POST['password'] != "" ) ) 
                 {
                 $firstName = $_POST['nom'];
                 $lastName = $_POST['prenom'];
                 $email = $_POST['email'];
                 $password =$_POST['password'];
                
        
                 $db->exec("UPDATE admins SET   nom='$firstName' , prenom='$lastName', 
                 email='$email', password='$password' WHERE id=1");    
                    echo "slkat ";
                 header("Location: parametres.php");
                }
                $db=null;
                }
?>                