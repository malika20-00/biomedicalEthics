<?php
session_start();
?>

<LINK href="note2.css" rel="stylesheet" type="text/css">
    <div class="grandContenu">
<p> Félicitations, vous avez validé le test</p>
<p>votre note est : <span><?php echo $_SESSION['note']; ?></span> </p>
<button class="commencerTest" id="telechargerCertificat" >télécharger votre certificat</button>
<br>
<a href="contenu.php" style="  margin-top:15px;display:block">retour</a>
</div>
<img src="felecitations.jfif" alt="Félicitations">
<script src="script.js"></script>