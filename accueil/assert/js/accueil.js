//  ***********************  clicked button in header
var menuLis = document.querySelectorAll(".header-li");
    
for (let li of menuLis) {
  
  li.addEventListener("click", function(){
    // 1. Remove Class from All Lis
    for (let li of menuLis) {
      li.classList.remove('clicked');
      console.log('class removed');
    }
    
    // 2. Add Class to Relevant Li
    this.classList.add('clicked');
    console.log('class added');
  });
  
};
/********************medai query de l'icone***************************/
document.querySelector(".header-icone").addEventListener("click",()=>{
document.querySelector(".header-ul").classList.remove("annuler-header");
document.querySelector(".header-ul").classList.add('click-icone');

});

/****************header fermer********************/
document.querySelector(".annuler").addEventListener('click',()=>
document.querySelector('.header-ul').classList.add("annuler-header")
);
/**************************************scroll animation****/
const sr = ScrollReveal({
  distance: '30px',
  duration: 1800,
  reset: true,
});

sr.reveal(`.accueil-text, .accueil-img`, {
  origin: 'top',
  interval: 200,
})

sr.reveal(`.contenu-qui-nous-sommes, .contacter-img,.article1`,{
  origin: 'left'
})

sr.reveal(`.back-img-qui, .form,.article3`, {
  origin: 'right'
})

document.querySelector(".form").addEventListener('submit', (e)=>{
  e.preventDefault();
  
  
  var data = new FormData(document.querySelector(".form"));

   
  var xhr = new XMLHttpRequest();
 
  xhr.onreadystatechange = function (){
    if(this.readyState != 4 ){
      console.log("fddggfgf");
document.getElementById("button-form").style.pointerEvents= "none"; 
document.getElementById("button-form").value = "Chargement"

    }
    if(this.readyState == 4 && this.status == 200){
      console.log(this.response);
      document.getElementById("button-form").style.pointerEvents= "auto"; 
      document.getElementById("button-form").value = "envoyer"
    /****************************** */
    if(this.response.reussi) {
     document.querySelector('.erreur').innerHTML = this.response.reussi;
      
      return false;
    } else  if(this.response.echou) {
      document.querySelector('.erreur').innerHTML = this.response.echou;

     
      return false;
    }
    //************nom********/
    if(this.response.nomVide) {
      document.querySelector('.erreur').innerHTML = this.response.nomVide;

      console.log("nom vide");
      return false;
    } else  if(this.response.nom) {
      document.querySelector('.erreur').innerHTML = this.response.nom;

      console.log("nom");
      return false;
    }
//****************prenom************/
if(this.response.prenomVide) {
  document.querySelector('.erreur').innerHTML = this.response.prenomVide;

  console.log("prenom");
  return false;
} else  if(this.response.prenom) {
  document.querySelector('.erreur').innerHTML = this.response.prenom;

  console.log("pre");
  return false;
}
//*************email*******************/
if(this.response.emailVide) {
document.querySelector('.erreur').innerHTML = this.response.emailVide;

  console.log("email");
  return false;
} else  if(this.response.emailInv) {
  document.querySelector('.erreur').innerHTML = this.response.emailInv;

  return false;
}
/**********************messages************/
if(this.response.messageVide) {
  document.querySelector('.erreur').innerHTML = this.response.messageVide;
   
  console.log("message");
  return false;
} 
 

  }   else if(this.readyState == 4){
    
    alert("Une erreur est servenue");
 
      return false;
   }

};
xhr.open("POST","../accueil/validation.php",true);

xhr.responseType = "json";
xhr.send(data);

});
