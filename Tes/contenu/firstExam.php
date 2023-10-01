<?php
session_start();
require_once("../../db.php");
$resultat=$db->query("SELECT * FROM temps ");
while($article=$resultat->fetch(PDO::FETCH_OBJ)){

   $duree=$article->duree;
}
$_SESSION["duree"] = $duree;
$_SESSION["start_time"] = date("Y-m-d H:i:s");

$end_time=date('Y-m-d H:i:s',
strtotime('+'.$_SESSION['duree'].'minutes',
strtotime($_SESSION["start_time"]))
);
$_SESSION["end_time"]=$end_time;

echo $end_time;
echo $duree;
?>
<script type="text/javascript">
window.location = "exam.php";
</script>
