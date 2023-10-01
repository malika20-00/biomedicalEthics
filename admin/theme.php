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
$id=$_SESSION['id'];

if($_SESSION['dark']==1){
    $_SESSION['dark']=0;
}
else $_SESSION['dark']=1;
$theme=$_SESSION['dark'];

$db->exec("UPDATE admins SET  dark=$theme WHERE id=$id");

$db=null;
}

?>
<a href="index.php">retour</a>