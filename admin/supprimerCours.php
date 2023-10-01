<?php
 require_once("../db.php");
$id=$_GET['id'];


//supprimer un fichier
$resultat=$db->query("SELECT * FROM pdf WHERE id='$id'");

if($resultat->rowCount()) {
  
$article=$resultat->fetch(PDO::FETCH_OBJ );
$nom=$article->nom;
$fichier = 'MesFichiers/'.$nom.'.pdf';
if(file_exists($fichier)){unlink($fichier);}
}
$db->exec("DELETE FROM pdf WHERE id='$id'");
$db=null;
?>