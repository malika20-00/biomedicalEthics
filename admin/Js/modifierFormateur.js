document.getElementById("form-modifier_formateur").addEventListener("submit",function(e){

    e.preventDefault();
     var data = new FormData(this);
     var xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function (){
     if(this.readyState == 4 && this.status == 200){
     /****************************** */
     if(!this.response) {
       alert("vos informations sont modifiee");
       window.location.href = "parametres.php";
       return false;
    
       
     } 
     else {
    
      /********************************photo profil */
      if(this.response.erreur_importation){
        document.getElementById("photo_erreur").innerHTML =this.response.erreur_importation;
       
       return false;
       
 
      }
      else if(this.response.format){
        document.getElementById("photo_erreur").innerHTML =this.response.format;
        return false;
      }
    else {
      document.getElementById("photo_erreur").innerHTML =" ";
      }

     /********************************nomFormateur */
     if(this.response.nomFormateurVide){
       document.getElementById("nom_erreur").innerHTML =this.response.nomFormateurVide;
      
      return false;
      

     }
   else {
       document.getElementById("nom_erreur").innerHTML =" ";
     }

     //****************prenomFormateur******************** */
     
     if(this.response.prenomFormateurVide){
    
       document.getElementById("prenom_erreur").innerHTML =this.response.prenomFormateurVide;
      return false;
       }
       else {
           document.getElementById("prenom_erreur").innerHTML =" ";
         }
      
       //****************emailFormateur******************** */
   
   if(this.response.emailFormateurVide){
       console.log("email is empty");
       document.getElementById("email_erreur").innerHTML =this.response.emailFormateurVide;
       

      return false;
     }
     else if(this.response.emailInv){
       console.log("email est invalide");
       document.getElementById("email_erreur").innerHTML =this.response.emailInv;
        
       return false;
     }else if(this.response.emailExist){
       console.log("email n'existe pas");
       document.getElementById("email_erreur").innerHTML =this.response.emailExist;
       return false;
     }
     else if (this.response.email){
       console.log("email existe ds bd");
       document.getElementById("email_erreur").innerHTML =this.response.email;
       return false;

     }else {
       document.getElementById("email_erreur").innerHTML =" ";
     }

    
       //****************passwordFormateur******************** */
     
     if(this.response.passwordFormateurVide){
       
       document.getElementById("password_erreur").innerHTML =this.response.passwordFormateurVide;
      return false;
       }
       else {
           document.getElementById("password_erreur").innerHTML =" ";
         }
      
       
   }
}
     else if(this.readyState == 4){
      alert("Une erreur est servenue");
    return false;
    }
  };
   xhr.open("POST","modifierFormateur.php",true);
   xhr.responseType = "json";
   xhr.send(data);
  
 });

 function readURL(input) {
  let array = new Array ('jpg', 'jpeg', 'png','jfif');

  if (input.files && input.files[0]) {
      var reader = new FileReader();
      var exist=0;
    var  extension = input.files[0].name.split('.').pop().toLocaleLowerCase();
    for(var i=0; i<array.length; i++) {
      if(extension=== array[i]) {
        reader.onload = function(e) {
          $('#photoProfilActuelle')
              .attr('src', e.target.result)
              .width(120)
              .height(120);
      };

      reader.readAsDataURL(input.files[0]);
      document.getElementById("photo_erreur").innerHTML="";
      exist=1;
      break;
      }
     
    }

if(exist==0){
  document.getElementById("photo_erreur").innerHTML='entrer une image,votre format doit être png jpeg ,jpg,jfif';
}

  // alert("l'extension du fichier est " + extension);
     
  }
}

document.getElementById("nomA").addEventListener("click",function(e){
  document.getElementById("nom_erreur").innerHTML =" ";

});
document.getElementById("prenomA").addEventListener("click",function(e){
  document.getElementById("prenom_erreur").innerHTML =" ";

});
document.getElementById("emailA").addEventListener("click",function(e){
  document.getElementById("email_erreur").innerHTML =" ";

});
document.getElementById("passwordA").addEventListener("click",function(e){
  document.getElementById("password_erreur").innerHTML =" ";

});