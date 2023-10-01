document.getElementById("form-ajouter-formateur").addEventListener("submit",function(e){
         e.preventDefault();
          var data = new FormData(this);
          var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function (){
          if(this.readyState == 4 && this.status == 200){
          /****************************** */
          if(!this.response) {
            

          
            alert("le formateur a été bien ajouté");
            // document.getElementById("nomF").value ="";
            // document.getElementById("prenomF").value ="";
            // document.getElementById("emailF").value ="";
            // document.getElementById("passwordF").value ="";
            window.location.href = "parametres.php";
         //   return false;
            
          } 
          else {
          /********************************nomFormateur */
         
          if(this.response.nomFormateurVide){
            document.getElementById("nomFormateur_erreur").innerHTML =this.response.nomFormateurVide;
           
           return false;
           
    
          }
        else {
            document.getElementById("nomFormateur_erreur").innerHTML =" ";
          }
    
          //****************prenomFormateur******************** */
          
          if(this.response.prenomFormateurVide){
         
            document.getElementById("prenomFormateur_erreur").innerHTML =this.response.prenomFormateurVide;
           return false;
            }
            else {
                document.getElementById("prenomFormateur_erreur").innerHTML =" ";
              }
           
            //****************emailFormateur******************** */
          
        //   if(this.response.emailFormateurVide){
           
        //     document.getElementById("emailFormateur_erreur").innerHTML =this.response.emailFormateurVide;
        //    return false;
        //     }
        //     else {
        //         document.getElementById("emailFormateur_erreur").innerHTML =" ";
        //       }
      
        if(this.response.emailFormateurVide){
            console.log("email is empty");
            document.getElementById("emailFormateur_erreur").innerHTML =this.response.emailFormateurVide;
            
    
           return false;
          }
          else if(this.response.emailInv){
            console.log("email est invalide");
            document.getElementById("emailFormateur_erreur").innerHTML =this.response.emailInv;
             
            return false;
          }else if(this.response.emailExist){
            console.log("email n'existe pas");
            document.getElementById("emailFormateur_erreur").innerHTML =this.response.emailExist;
            return false;
          }
          else if (this.response.email){
            console.log("email existe ds bd");
            document.getElementById("emailFormateur_erreur").innerHTML =this.response.email;
            return false;
    
          }else {
            document.getElementById("emailFormateur_erreur").innerHTML =" ";
          }
    
         
            //****************passwordFormateur******************** */
          
          if(this.response.passwordFormateurVide){
            
            document.getElementById("passwordFormateur_erreur").innerHTML =this.response.passwordFormateurVide;
           return false;
            }
            else {
                document.getElementById("passwordFormateur_erreur").innerHTML =" ";
              }
           
            
        }
     }
          else if(this.readyState == 4){
           alert("Une erreur est servenue");
         return false;
         }
       };
        xhr.open("POST","parametreVerification.php",true);
        xhr.responseType = "json";
        xhr.send(data);
       
      });

      function readURL2(input) {
        let array = new Array ('jpg', 'jpeg', 'png','jfif');
      
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var exist=0;
          var  extension = input.files[0].name.split('.').pop().toLocaleLowerCase();
          for(var i=0; i<array.length; i++) {
            if(extension=== array[i]) {
              reader.onload = function(e) {
                $('#photoProfilFormateur')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };
      
            reader.readAsDataURL(input.files[0]);
            document.getElementById("photoFormateur_erreur").innerHTML="";
            exist=1;
            break;
            }
           
          }
      
      if(exist==0){
        document.getElementById("photoFormateur_erreur").innerHTML='entrer une image,votre format doit être png jpeg ,jpg,jfif';
      }
      
        // alert("l'extension du fichier est " + extension);
           
        }
      }


      document.getElementById("nomF").addEventListener("click",function(e){
        document.getElementById("nomFormateur_erreur").innerHTML =" ";
      
      });
      document.getElementById("prenomF").addEventListener("click",function(e){
        document.getElementById("prenomFormateur_erreur").innerHTML =" ";
      
      });
      document.getElementById("emailF").addEventListener("click",function(e){
        document.getElementById("emailFormateur_erreur").innerHTML =" ";
      
      });
      document.getElementById("passwordF").addEventListener("click",function(e){
        document.getElementById("passwordFormateur_erreur").innerHTML =" ";
      
      });