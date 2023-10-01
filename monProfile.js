document.getElementById("form_profil_user").addEventListener("submit",function(e){

  e.preventDefault();
   var data = new FormData(this);
   var xhr = new XMLHttpRequest();
 xhr.onreadystatechange = function (){
   if(this.readyState == 4 && this.status == 200){
   /****************************** */
   if(!this.response) {
     alert("vos informations sont modifiee");
     window.location.href = "monProfile.php";
     return false;
  
     
   } 
   else {
  
    /********************************photo profil */
    if(this.response.erreur_importation){
      document.getElementById("photoErreur").innerHTML =this.response.erreur_importation;
     
     return false;
     

    }
    else if(this.response.format){
      document.getElementById("photoErreur").innerHTML =this.response.format;
      return false;
    }
  else {
    document.getElementById("photoErreur").innerHTML =" ";
    }

   /********************************nom */
   if(this.response.nomVide){
     document.getElementById("nomErreur").innerHTML =this.response.nomVide;
    
    return false;
    

   }
 else {
     document.getElementById("nomErreur").innerHTML =" ";
   }

   //****************prenom******************** */
   
   if(this.response.prenomVide){
  
     document.getElementById("prenomErreur").innerHTML =this.response.prenomVide;
    return false;
     }
     else {
         document.getElementById("prenomErreur").innerHTML =" ";
       }
    
     //****************email******************** */
 
 if(this.response.emailVide){
     console.log("email is empty");
     document.getElementById("emailErreur").innerHTML =this.response.emailVide;
     

    return false;
   }
   else if(this.response.emailInv){
     console.log("email est invalide");
     document.getElementById("emailErreur").innerHTML =this.response.emailInv;
      
     return false;
   }else if(this.response.emailExist){
     console.log("email n'existe pas");
     document.getElementById("emailErreur").innerHTML =this.response.emailExist;
     return false;
   }
   else if (this.response.email){
     console.log("email existe ds bd");
     document.getElementById("emailErreur").innerHTML =this.response.email;
     return false;

   }else {
     document.getElementById("emailErreur").innerHTML =" ";
   }
//etablissement
if(this.response.etablissementVide){
  
  document.getElementById("etablissementErreur").innerHTML =this.response.etablissementVide;
 return false;
  }
  else {
      document.getElementById("etablissementErreur").innerHTML =" ";
    }
    //filiere

  if(this.response.filiereVide){
  
  document.getElementById("filiereErreur").innerHTML =this.response.filiereVide;
 return false;
  }
  else {
      document.getElementById("filiereErreur").innerHTML =" ";
    }
    //date
    if(this.response.dateVide){
     
      document.getElementById("dateErreur").innerHTML =this.response.dateVide;
     return false;
      }
      else if(this.response.dateMin){
       document.getElementById("dateErreur").innerHTML =this.response.dateMin;
       return false;
      }
      else {
          document.getElementById("dateErreur").innerHTML =" ";
        }
     //****************passwordAncien******************** */
   
   if(this.response.passwordAncienVide){
     
     document.getElementById("passwordAncienErreur").innerHTML =this.response.passwordAncienVide;
    return false;
     }
     else if(this.response.passwordAncienErrone){
      document.getElementById("passwordAncienErreur").innerHTML =this.response.passwordAncienErrone;
      return false;
     }
     else {
         document.getElementById("passwordNouveauErreur").innerHTML =" ";
       }
    
     
 }
}
   else if(this.readyState == 4){
    alert("Une erreur est servenue");
  return false;
  }
};
 xhr.open("POST","modifierProfil.php",true);
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
        $('#photoUser')
            .attr('src', e.target.result)
            .width(120)
            .height(120);
    };

    reader.readAsDataURL(input.files[0]);
    document.getElementById("photoErreur").innerHTML="";
    exist=1;
    break;
    }
   
  }

if(exist==0){
document.getElementById("photoErreur").innerHTML='entrer une image,votre format doit être png jpeg ,jpg,jfif';
}

// alert("l'extension du fichier est " + extension);
   
}
}

document.getElementById("nomU").addEventListener("click",function(e){
document.getElementById("nomErreur").innerHTML =" ";

});
document.getElementById("prenomU").addEventListener("click",function(e){
document.getElementById("prenomErreur").innerHTML =" ";

});
document.getElementById("emailU").addEventListener("click",function(e){
document.getElementById("emailErreur").innerHTML =" ";

});
document.getElementById("nouveauPwdU").addEventListener("click",function(e){
document.getElementById("passwordNouveauErreur").innerHTML =" ";

});
document.getElementById("ancienPwdU").addEventListener("click",function(e){
  document.getElementById("passwordAncienErreur").innerHTML =" ";
  
  });
  document.getElementById("filiereU").addEventListener("click",function(e){
    document.getElementById("filiereErreur").innerHTML =" ";
    
    });
    document.getElementById("etablissementU").addEventListener("click",function(e){
      document.getElementById("etablissementErreur").innerHTML =" ";
      
      });
      document.getElementById("date").addEventListener("click",function(e){
        document.getElementById("dateErreur").innerHTML =" ";
        
        });