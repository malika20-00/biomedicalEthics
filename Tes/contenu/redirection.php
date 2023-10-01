<?php
  include "../../db.php";
$titre=$_GET['name'];
$name='../../admin/MesFichiers/'.$titre.'.pdf';
  
  $resultat = $db->query("SELECT * FROM pdf where nom='$titre'");
  $article=$resultat->fetch(PDO::FETCH_OBJ);
 $vu=$article->vu+1;
 $db->exec("UPDATE pdf SET vu='$vu' where nom='$titre'");

    header('Content-Type: application/pdf') ;
    header('Content-Disposition: inline') ;
    readfile($name) ;
    $db=null;
?>