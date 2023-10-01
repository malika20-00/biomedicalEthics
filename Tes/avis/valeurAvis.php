<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location:../../accueil/accueil.php"); 
 
}
else{
    require_once("../../db.php");
    if(!empty($_GET['ID'])){
    $_SESSION['valeuravis']=$_GET['ID'];
    echo $_SESSION['valeuravis'];
} 

if(!empty($_POST)){
    $id=$_SESSION['id'];
    $messageavis= $_POST['messageavis'];
    $valeuravis= $_SESSION['valeuravis'];
    $dateavis= date("Y-m-d H:i:s");
    $admin= $_SESSION['Admin'];
    $statement=$db->prepare('INSERT INTO avis(id,valeuravis,messageavis,dateavis,admin) VALUES(:id,:valeuravis,:messageavis,:dateavis,:admin)');
    $statement->execute([
       
        "id"=>$id,
        "valeuravis"=>$valeuravis,
        "messageavis"=>$messageavis,
        "dateavis"=>$dateavis,
        "admin"=>$admin,

       
     
    ]);
    $db=null;
    header("Location:avis.php"); 
} 


}
?>