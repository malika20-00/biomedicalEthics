<?php 
$user ='root';
$pass='';
 try{
  $db=new PDO('mysql:host=localhost;dbname=premierbd',$user,$pass);
  
}
  
  catch(PDOException $e)
  {
      print 'erreur : '.$e->getMessage()."<br/>";
      die;
  }



   
    
?>
   