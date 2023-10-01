<?php
if(isset($_GET['id']) and  !empty($_GET['id'])) {
    require_once("../db.php");
    $id=$_GET['id'];
    $db->exec("DELETE FROM admins WHERE id=$id");
    $db=null;
}

?>