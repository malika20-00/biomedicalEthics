document.getElementById("form-ajouter-question").addEventListener("submit",function(e){
    e.preventDefault();
  
    var data = new FormData(this);
      var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
      if(this.readyState == 4 && this.status == 200){
      /****************************** */
      if(!this.response) {
       window.location.href = "examen.php";
        
      } 
      else {
      /********************************question */
      if(this.response.questionVide){
        document.getElementById("question_erreur").innerHTML =this.response.questionVide;
       
       return false;
       

      }
    else {
        document.getElementById("question_erreur").innerHTML =" ";
      }

      //****************choix1******************** */
      
      if(this.response.choix1Vide){
     
        document.getElementById("choix1_erreur").innerHTML =this.response.choix1Vide;
       return false;
        }
        else {
            document.getElementById("choix1_erreur").innerHTML =" ";
          }
       
        //****************choix2******************** */
      
      if(this.response.choix2Vide){
       
        document.getElementById("choix2_erreur").innerHTML =this.response.choix2Vide;
       return false;
        }
        else {
            document.getElementById("choix2_erreur").innerHTML =" ";
          }
       
        //****************choix3******************** */
      
      if(this.response.choix3Vide){
        console.log("prenom is empty");
        document.getElementById("choix3_erreur").innerHTML =this.response.choix3Vide;
       return false;
        }
        else {
            document.getElementById("choix3_erreur").innerHTML =" ";
          }
        //   reponse
        if(this.response.reponseVide){
       
            document.getElementById("reponse_erreur").innerHTML =this.response.reponseVide;
           return false;
            }
            else {
                document.getElementById("reponse_erreur").innerHTML =" ";
              }
        
    }
 }
      else if(this.readyState == 4){
       alert("Une erreur est servenue");
     return false;
     }
   };
    xhr.open("POST","ajouterQuestionExam.php",true);
    xhr.responseType = "json";
    xhr.send(data);
   
  });

  document.getElementById("question").addEventListener("click",function(e){
    document.getElementById("question_erreur").innerHTML =" ";
    
    });
    document.getElementById("choix1").addEventListener("click",function(e){
      document.getElementById("choix1_erreur").innerHTML =" ";
      
      });
      document.getElementById("choix2").addEventListener("click",function(e){
        document.getElementById("choix2_erreur").innerHTML =" ";
        
        });
        document.getElementById("choix3").addEventListener("click",function(e){
          document.getElementById("choix3_erreur").innerHTML =" ";
          
          });