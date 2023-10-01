document.getElementById("form-ajouter-cours").addEventListener("submit",function(e){
    e.preventDefault();
  
    var data = new FormData(this);
      var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
      if(this.readyState == 4 && this.status == 200){
      /****************************** */
      if(!this.response) {
       window.location.href = "cours.php";
        
      } 
      else {
      /********************************titre */
      if(this.response.titreVide){
      
        document.getElementById("titre_erreur").innerHTML =this.response.titreVide;
       
       return false;
       

      }
      else if(this.response.titreExist){
        document.getElementById("titre_erreur").innerHTML =this.response.titreExist;
       
        return false;
      }
    else {
        document.getElementById("titre_erreur").innerHTML =" ";
      }

      //****************description******************** */
      
      if(this.response.descriptionVide){
        console.log("prenom is empty");
        document.getElementById("description_erreur").innerHTML =this.response.descriptionVide;
       return false;
        }
        else {
            document.getElementById("description_erreur").innerHTML =" ";
          }
     //****************file******************** */
     if(this.response.fileVide){
        console.log("prenom is empty");
        document.getElementById("file_erreur").innerHTML =this.response.fileVide;
       return false;
        }
        else if(this.response.fileImportation){
            document.getElementById("file_erreur").innerHTML =this.response.fileImportatio;
        }
        else {
            document.getElementById("file_erreur").innerHTML =" ";
          }

    //  end file*******************
    }
 }
      else if(this.readyState == 4){
       alert("Une erreur est servenue");
     return false;
     }
   };
    xhr.open("POST","ajouterCours.php",true);
    xhr.responseType = "json";
    xhr.send(data);
   
  });

  document.getElementById("titreCours").addEventListener("click",function(e){
    document.getElementById("titre_erreur").innerHTML =" ";
    
    });
    document.getElementById("descriptionCours").addEventListener("click",function(e){
      document.getElementById("description_erreur").innerHTML =" ";
      
      });
      document.getElementById("fileCours").addEventListener("click",function(e){
        document.getElementById("file_erreur").innerHTML =" ";
        
        });