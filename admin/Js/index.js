const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const themeToggler = document.querySelector('.theme-toggler');

//show side bar
if (menuBtn && sideMenu) {
  menuBtn.addEventListener('click', () => {
    //  sideMenu.style.display='inline-block';
    sideMenu.classList.add("visible");

  })
}

//close side bar
if (closeBtn) {
  closeBtn.addEventListener('click', () => {
    // sideMenu.style.display='none';
    sideMenu.classList.remove("visible");
  })
}




if (themeToggler) {

  themeToggler.addEventListener('click', () => {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.body.classList.toggle('dark-theme-variables');

        // ******************cours**********************
        var myElements1 = document.getElementsByClassName('input_dark_id');
        if (myElements1) {
          for (var counter = 0; counter < myElements1.length; counter++) {
            myElements1[counter].classList.toggle('input_dark');
            myElements1[counter].classList.toggle('input_light');
          }
        }


        // ******************exam**********************
        var myElements = document.getElementsByClassName('textarea_dark_id');
        if (myElements) {
          for (var counter = 0; counter < myElements.length; counter++) {
            myElements[counter].classList.toggle('input_dark');
          }
        }

        themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
        themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
        return true;
      }
    }

    xhr.open("POST", "theme.php", true);
    xhr.responseType = "json";
    xhr.send();
  });
}
//----------------------------message -----------------
if (document.getElementById("formulaire")) {
  document.getElementById("formulaire").addEventListener('submit', (e) => {
    e.preventDefault();


    var data = new FormData(document.querySelector("#formulaire"));


    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (this.readyState == 0 || this.readyState == 1 || this.readyState == 2 || this.readyState == 3) {
        document.getElementById("repondre").style.pointerEvents = "none";
        document.getElementById("repondre").value = "Chargement ...";

      }
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.response);
        document.getElementById("repondre").style.pointerEvents = "auto";
        document.getElementById("repondre").value = "Envoyer";
        if (this.response.reussi) {
          document.getElementById("erreur").innerHTML = "<span style='color:green'>la réponse a bien été envoyé</span>";
        } else {
          if (this.response.messageVid) {
            document.getElementById("erreur").innerHTML = "la réponse est vide";
          } else if (this.response.echou) {
            document.getElementById("erreur").innerHTML = "une erreur a été survenu";
          }
          else {
            document.getElementById("erreur").innerHTML = "";
          }
        }




      }
      else if (this.readyState == 4) {
        document.getElementById("repondre").style.pointerEvents = "auto";
        document.getElementById("repondre").innerHTML = "Envoyer la réponse"
        alert("Une erreur est servenue");

        return false;
      }
    };
    xhr.open("POST", "envoi.php", true);

    xhr.responseType = "json";
    xhr.send(data);
  });
}
/*------------------------------parametre---------------------*/
if (document.getElementById("parametre-form")) {
  document.getElementById("parametre-form").addEventListener('submit', (e) => {

    e.preventDefault();


    var data = new FormData(document.querySelector("#parametre-form"));


    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (this.readyState == 0 || this.readyState == 1 || this.readyState == 2 || this.readyState == 3) {
        document.getElementById("sauvegarder").style.pointerEvents = "none";
        document.getElementById("sauvegarder").innerHTML = "Chargement ...";

      }
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.response);
        document.getElementById("sauvegarder").style.pointerEvents = "auto";
        document.getElementById("sauvegarder").innerHTML = "Sauvegarder";
        if (!this.response) {
          document.getElementById("erreur").innerHTML = "vos données ont bien été sauvegardé";
        } else {
          // if(this.response.messageVid){
          //   document.getElementById("erreur").innerHTML= "la réponse est vide";
          //}
          // else if(this.response.erreur) {
          //   document.getElementById("erreur").innerHTML= "une erreur a été survenu";
          // }
          // else {
          //   document.getElementById("erreur").innerHTML= "";
          // }

        }




      }
      else if (this.readyState == 4) {
        document.getElementById("sauvegarder").style.pointerEvents = "auto";
        document.getElementById("sauvegarder").innerHTML = "Sauvegarder"
        alert("Une erreur est servenue");

        return false;
      }
    };
    xhr.open("POST", "parametreVerification.php", true);

    xhr.responseType = "json";
    xhr.send(data);


  });
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah')
        .attr('src', e.target.result)
        .width(120)
        .height(120);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
// *************cours.php+++supprimerCours+++++++++++

function supprimerCours(e) {
  var xhr = new XMLHttpRequest();
  var id = e;
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (document.getElementById(e)) {
        document.getElementById(e).style.display = "none";
      }

    }
  }

  xhr.open("GET", "supprimerCours.php?id=" + id, true);
  xhr.responseType = "json";
  xhr.send();


}
// *************supprimerQuestion+++++++++++

function supprimerQuestion(e) {
  var xhr = new XMLHttpRequest();
  var id = e;
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (document.getElementById(e)) {
        document.getElementById(e).style.display = "none";
      }

    }
  }

  xhr.open("GET", "supprimerQuestion.php?id=" + id, true);
  xhr.responseType = "json";
  xhr.send();


}
// *************demande.php+++++++++++

function accepterUser(e) {
  var xhr = new XMLHttpRequest();
  var id = e;
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (document.getElementById(e)) {
        document.getElementById(e).style.display = "none";
      }

    }
  }

  xhr.open("GET", "accepterUser.php?id=" + id, true);
  xhr.responseType = "json";
  xhr.send();
}
// *************demande.php+++++++++++

function refuserUser(e) {
  var xhr = new XMLHttpRequest();
  var id = e;
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (document.getElementById(e)) {
        document.getElementById(e).style.display = "none";
      }

    }
  }

  xhr.open("GET", "refuserUser.php?id=" + id, true);
  xhr.responseType = "json";
  xhr.send();
}

if (document.querySelector(".temps")) {

  document.querySelector(".temps").addEventListener("submit", e => {
    
    e.preventDefault();
    var data = new FormData(document.querySelector(".temps"));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {

      if (this.readyState == 4 && this.status == 200) {
       document.querySelector(".faux").innerHTML = this.response['erreur'];
        console.log(this.response);
      }
    }


    xhr.open("POST", "minute.php", true);
    xhr.responseType = "json";
    xhr.send(data);

  })
}
if(document.getElementById("temps")){
document.getElementById("temps").addEventListener("click",function(e){
  document.querySelector(".faux").innerHTML =" ";
  
  });

  document.getElementById("nombreQuestions").addEventListener("click",function(e){
    document.querySelector(".faux").innerHTML =" ";
    
    });
  }
 //supprimer les messages

 function supprimerMessage(e){
  var xhr = new XMLHttpRequest();
  var id=e;
     xhr.onreadystatechange = function (){
    if(this.readyState == 4 && this.status == 200){
      if( document.getElementById(e)){
        document.getElementById(e).style.display ="none";
      }
      
       }
        }
     
     xhr.open("GET","supprimerMessage.php?id="+id,true);
     xhr.responseType = "json";
     xhr.send();
 }


 // supprimerFormateur

 function  supprimerFormateur(e){
  var xhr = new XMLHttpRequest();
  var id=e;
     xhr.onreadystatechange = function (){
    if(this.readyState == 4 && this.status == 200){
      if( document.getElementById(e)){
        document.getElementById(e).style.display ="none";
      }
      
       }
        }
     
     xhr.open("GET","supprimerFormateur.php?id="+id,true);
     xhr.responseType = "json";
     xhr.send();
 }

