

document.querySelector(".formulaire").addEventListener('submit', (e)=>{
  e.preventDefault();
  
  
  var data = new FormData(document.querySelector(".formulaire"));

   
  var xhr = new XMLHttpRequest();
 
  xhr.onreadystatechange = function (){
    if(this.readyState == 0 || this.readyState == 1 ||this.readyState == 2 || this.readyState == 3){
 document.getElementById("envoie").style.pointerEvents= "none"; 
 document.getElementById("envoie").value = "Chargement ...";

    }
    if(this.readyState == 4 && this.status == 200){
      document.getElementById("envoie").style.pointerEvents= "auto"; 
      document.getElementById("envoie").value= "envoyer";
    /****************************** */
    if(this.response.reussi) {
     document.querySelector('.erreur').innerHTML = this.response.reussi;
      return false;
    } else  if(this.response.echou) {
      document.querySelector('.erreur').innerHTML = this.response.echou;

      return false;
    }
    
    /************nom********/
    if(this.response.nomVide) {
        document.querySelector('.erreur').innerHTML = this.response.nomVide;
  
        return false;
      } else  if(this.response.nom) {
        document.querySelector('.erreur').innerHTML = this.response.nom;
  
        return false;
      }
      
//*************email*******************/
if(this.response.emailVide) {
document.querySelector('.erreur').innerHTML = this.response.emailVide;

  return false;
} else  if(this.response.emailInv) {
  document.querySelector('.erreur').innerHTML = this.response.emailInv;

  return false;
}
/**********************messages************/
if(this.response.messageVide) {
  document.querySelector('.erreur').innerHTML = this.response.messageVide;
   
  return false;
} 
 

  }   else if(this.readyState == 4){
  
    alert("Une erreur est servenue");
 
      return false;
   }

};
xhr.open("POST","validation.php",true);

xhr.responseType = "json";
xhr.send(data);

});
