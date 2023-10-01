<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <p>nnnnnnnnn</p>
    <?php
    session_start();
    if(isset($_SESSION['Admin'])){
    if($_SESSION['Admin']==1){
        header("Location:../../admin/index.php"); 
    }
    else{
       if( $_SESSION['accepte']==1){
        header("Location:../../tes/contenu/contenu.php");  }
       else { header("Location:attendre.php");}
    }
}

    ?>
</body>
</html>