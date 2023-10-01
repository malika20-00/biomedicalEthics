<?php
require_once '../mail.php';
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
$db->exec("UPDATE users SET   accepte=true WHERE id=$id");
$nom=$_GET['nom'];

$resultat2=$db->query("SELECT * FROM users  WHERE  id='$id'");
$monArticle=$resultat2->fetch(PDO::FETCH_OBJ);
$monid=$monArticle->id;
$resultat2=$db->query("INSERT INTO `table1`( `id`) VALUES ('$monid')");



$mail->setFrom('touriaa.abbou@gmail.com',mb_encode_mimeheader( 'site de l\'éthique médicale', 'UTF-8'));
$mail->addAddress($monArticle->email);
$mail->Subject = mb_encode_mimeheader('Message envoyé par le site de l\'éthique médicale', 'UTF-8');
$message = "Bonjour Monsieur ou Madame,<br>
Votre demande de création de compte dans le site de l'éthique biomédicale a été accepté veuillez visiter le site pour se connecter et commencer votre formation.<br>cordialement.";
$mail->Body    = $message;
$mail->send();

$db=null;
}
?>
