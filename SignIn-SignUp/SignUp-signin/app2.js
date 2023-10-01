'use strict'
window.onload = function exampleFunction() {
  console.log('The Script will load now.');
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      if (this.response) {
        if (this.response.email) {
          console.log("email");
          document.getElementById("email").setAttribute('value', this.response.email);
        }
        if (this.response.password) {
          console.log("password");
          document.getElementById("password").setAttribute('value', this.response.password);
        }
      }
      return true;
    }
    console.log('The Script will load now.');
  }

  xhr.open("GET", "sign-in/signIn.php?malika=kkk", true);
  xhr.responseType = "json";
  ;
  xhr.send();
}


const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

//traiter une formulaire dd'une facon asynchrone 


document.getElementById("sign-up-form").addEventListener("submit", function (e) {
  e.preventDefault();

  var data = new FormData(this);
  // creation d'un objet http request qui va nous permettre de faire un appel asynchrone
  // e.preventDefault();

  var xhr = new XMLHttpRequest();
  //ecouter lorsqu'on a un changement d'état
  xhr.onreadystatechange = function () {
    if (this.readyState == 0 || this.readyState == 1 || this.readyState == 2 || this.readyState == 3) {
      document.getElementById("inscrir").style.pointerEvents = "none";
      document.getElementById("inscrir").value = "Chargement...";


    }
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById("inscrir").style.pointerEvents = "auto";
      document.getElementById("inscrir").value = "S'inscrir";
      /****************************** */
      if (!this.response) {

        // container.classList.remove("sign-up-mode");
        window.location.href = "attendre.php";
        // console.log("lalal");
        return false;
      } else {
        /******************************** */
        if (this.response.nomVide) {



          console.log("nom is empty");
          document.getElementById("nomP").innerHTML = this.response.nomVide;

          return false;


        }
        else if (this.response.nom) {
          console.log("nom est invalide");
          document.getElementById("nomP").innerHTML = this.response.nom;
          return false;

        } else {
          document.getElementById("nomP").innerHTML = " ";
        }

        //****************Prenom******************** */

        if (this.response.prenomVide) {
          console.log("prenom is empty");
          document.getElementById("prenomP").innerHTML = this.response.prenomVide;

          return false;


        }
        else if (this.response.prenom) {
          console.log("prenom est invalide");
          document.getElementById("prenomP").innerHTML = this.response.prenom;

          return false;
        } else {
          document.getElementById("prenomP").innerHTML = " ";
        }






        //****************Etablissement******************** */

        if (this.response.etablissementVide) {
          console.log("etablissement is empty");
          document.getElementById("etablissementP").innerHTML = this.response.etablissementVide;
          return false;

        }
        else if (this.response.etablissement) {
          console.log("etablissement est invalide");
          document.getElementById("etablissementP").innerHTML = this.response.etablissement;
          return false;

        } else {
          document.getElementById("etablissementP").innerHTML = " ";
        }

        //****************specialite******************** */

        if (this.response.specialiteVide) {
          console.log("specialite is empty");
          document.getElementById("specialiteP").innerHTML = this.response.specialiteVide;

          return false;


        }
        else if (this.response.specialite) {
          console.log("specialite est invalide");
          document.getElementById("specialiteP").innerHTML = this.response.specialite;

          return false;
        } else {
          document.getElementById("specialiteP").innerHTML = " ";
        }
        //   *************************DATE**************************
        if (this.response.dateVide) {
          console.log("date is empty");
          document.getElementById("dateP").innerHTML = this.response.dateVide;

          return false;


        }
        else if (this.response.dateMin) {
          console.log("date is empty");
          document.getElementById("dateP").innerHTML = this.response.dateMin;

          return false;


        } else {
          document.getElementById("dateP").innerHTML = " ";
        }





        // *******************EMAIL********************

        if (this.response.emailVide) {
          console.log("email is empty");
          document.getElementById("emailP").innerHTML = this.response.emailVide;


          return false;
        }
        else if (this.response.emailInv) {
          console.log("email est invalide");
          document.getElementById("emailP").innerHTML = this.response.emailInv;

          return false;
        } else if (this.response.emailExist) {
          console.log("email n'existe pas");
          document.getElementById("emailP").innerHTML = this.response.emailExist;
          return false;
        }
        else if (this.response.email) {
          console.log("email existe ds bd");
          document.getElementById("emailP").innerHTML = this.response.email;
          return false;

        } else {
          document.getElementById("emailP").innerHTML = " ";
        }


        if (this.response.password) {
          console.log("password est vide");
          document.getElementById("passwordP").innerHTML = this.response.password;
          return false;
        } else if (this.response.passwordMin) {
          document.getElementById("passwordP").innerHTML = this.response.passwordMin;
          return false;
        }



        else if (this.response.passwordConf) {
          console.log("les mot de passes sont diff");
          document.getElementById("passwordConfP").innerHTML = this.response.passwordConf;
          return false;

        } else {
          document.getElementById("passwordConfP").innerHTML = "";
        }
      }




    }
    else if (this.readyState == 4) {
      alert("Une erreur est servenue");

      return false;



    }

    //  return false;

  };
  // status indicates if server response is ok.

  xhr.open("POST", "fichPhp/sign-up2.php", true);
  // il faut aussi definir le types des parametres qu'on va passer avec n
  //  xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded")
  // c'est un formulaire
  // a l'aide de la fonction send on va passer les paramateres
  xhr.responseType = "json";
  xhr.send(data);

});

// validation de la form sign-in 

document.getElementById("sign-in-form").addEventListener("submit", function (e) {

  e.preventDefault();
  var data = new FormData(this);
  var xhr = new XMLHttpRequest();
  //ecouter lorsqu'on a un changement d'état
  xhr.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      /****************************** */
      if (!this.response) {
        document.getElementById("resultat").innerHTML = "";

        window.location.href = "reussi.php";
        // window.location.href = "../../home.php";
      } else {
        /******************************** */
        if (this.response.empty) {


          document.getElementById("resultat").innerHTML = this.response.empty;
          return false;
        }
        if (this.response.emailInv) {

          document.getElementById("resultat").innerHTML = this.response.emailInv;
          return false;

        }
        if (this.response.invalide) {

          document.getElementById("resultat").innerHTML = this.response.invalide;
          return false;

        }

      }
    }
    else if (this.readyState == 4) {
      //alert("Une erreur est servenue");

    }
  }

  xhr.open("POST", "sign-in/signIn.php", true);
  xhr.responseType = "json";
  xhr.send(data);



})


/***********************recuperation de mot de passe******************************* */

const oublie = document.querySelector(".oublie");
const form = document.querySelector("#sign-in-form");

const recup = document.querySelector(".recup");


oublie.addEventListener('click', function () {
  form.style.display = "none";
  recup.style.display = "flex";

})

const btnOublie = document.querySelector(".btn-oublie");
const formOublie = document.querySelector(".form-oublie");
const reussiOublie = document.querySelector(".reussi-oublie")
console.log(reussiOublie);

//btnOublie.addEventListener('click',function(e){

// e.preventDefault();
//  formOublie.style.display= "none";
//reussiOublie.style.display="flex";



//})
document.addEventListener('click', function handleClickOutsideBox(event) {
  if (window.getComputedStyle(recup).display === "flex") {
    console.log("dd");

    const box = document.getElementById('recup');

    if (!box.contains(event.target) && !oublie.contains(event.target)) {
      console.log("inside")
      box.style.display = 'none';
      form.style.display = "flex";
    }
  }
});
//vider l'input
document.getElementById("nomUp").addEventListener("click", function (e) {
  document.getElementById("nomP").innerHTML = " ";

});
document.getElementById("prenomUp").addEventListener("click", function (e) {
  document.getElementById("prenomP").innerHTML = " ";

});
document.getElementById("emailUp").addEventListener("click", function (e) {
  document.getElementById("emailP").innerHTML = " ";

});
document.getElementById("passwordUp").addEventListener("click", function (e) {
  document.getElementById("passwordP").innerHTML = " ";

}); passwordConfP
document.getElementById("passwordConf").addEventListener("click", function (e) {
  document.getElementById("passwordConfP").innerHTML = " ";

});
document.getElementById("specialite").addEventListener("click", function (e) {
  document.getElementById("specialiteP").innerHTML = " ";

});
document.getElementById("etablissement").addEventListener("click", function (e) {
  document.getElementById("etablissementP").innerHTML = " ";

});
document.getElementById("date").addEventListener("click", function (e) {
  document.getElementById("dateP").innerHTML = " ";

});
document.getElementById("email").addEventListener("click", function (e) {
  document.getElementById("resultat").innerHTML = " ";

});
document.getElementById("password").addEventListener("click", function (e) {
  document.getElementById("resultat").innerHTML = " ";

});
/*******************************mot de passe oublié*************/

document.getElementById("oubliAjax").addEventListener("submit", function (e) {

  e.preventDefault();
  var data = new FormData(this);
  var xhr = new XMLHttpRequest();
  //ecouter lorsqu'on a un changement d'état
  xhr.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      /****************************** */
      if (this.response) {
        document.getElementById("erreurAjax").innerHTML =this.response.erreur ;

       
      } 
        
    }
   
  }

  xhr.open("POST", "oubliAjax.php", true);
  xhr.responseType = "json";
  xhr.send(data);



})
