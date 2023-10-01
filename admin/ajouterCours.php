<?php
 

session_start();
  if (!empty($_POST)){

    require_once("../db.php");
    $errors = array();
    $titre = htmlspecialchars(strip_tags(trim(strtolower($_POST['titre']))));
    $description= htmlspecialchars(strip_tags(trim(strtolower($_POST['description']))));
    if(empty($titre)){
        $errors['titreVide']="Veuillez saisir le titre";

    }
    if(empty($description)){
        $errors['descriptionVide']="Veuillez saisir la description";

    }
    else{
        $resultat = $db->query("SELECT id FROM pdf WHERE nom='$titre'");
        while ($article = $resultat->fetch(PDO::FETCH_OBJ)) {
            if ($article) {
                $errors['titreExist'] = 'Ce titre existe déjà';
            }
        }
    }
    if(empty($_FILES['coursFile']['name'])){
        $errors['fileVide']="Veuillez entrer un fichier sous format pdf";
    }

   if(!empty($_FILES['coursFile']['name']) and empty($errors)){
    $extensionValide = 'pdf';
  
    $extensionUpload = strtolower(substr(strrchr($_FILES['coursFile']['name'], '.'), 1));
  if($extensionUpload!= 'pdf'){
    $errors['fileVide']="Veuillez entrer un fichier sous format pdf";
}
   else {
        $chemin = 'MesFichiers/' . $titre. '.' . $extensionUpload;;
        $resultat = move_uploaded_file($_FILES['coursFile']['tmp_name'], $chemin);

        if (!$resultat) {

            $errors['fileImportation']="erreur pendant l'importation de fichier";
         
        } 
    }
   }

    if(empty($errors)){
      
       

        $prenom=$_SESSION['prenom'];
        $nom=$_SESSION['nom'];
        $formateur=$prenom.' '.$nom;
        $date= date("Y-m-d H:i:s");
       
        $statement=$db->prepare("INSERT INTO pdf(nom,formateur,description,date)VALUES(:titre,:formateur,:description,:date)");
        $statement->execute([
           
            "titre"=>$titre,
            "formateur"=>$formateur,
            "date"=>$date,
            "description"=>$description,
           
         
        ]);
        $errors =null;
    }
    $db=null;
    echo json_encode($errors);

}
// ====================


	

?>