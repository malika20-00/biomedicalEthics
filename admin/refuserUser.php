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
$id=$_GET['id'];
$db->exec("DELETE FROM table1 WHERE id=$id");
$db->exec("DELETE FROM users WHERE id=$id");
$db=null;
}
?>