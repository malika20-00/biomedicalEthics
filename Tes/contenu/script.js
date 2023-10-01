const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");


allSideMenu.forEach(item => {

    const li = item.parentElement;


    item.addEventListener('click', function () {

        console.log(item);
        allSideMenu.forEach(i => {

            i.parentElement.classList.remove('active');





        })
        li.classList.add("active");
    })
})
var terminer = document.getElementById('terminer');
if (terminer) {
    terminer.addEventListener('click', () => {

        var xhr = new XMLHttpRequest();
        var text = terminer.innerHTML;
        var nouveauContenu;
        var action;
        if (text == 'indiquer que ce chapitre est terminer') {
            nouveauContenu = "indiquer que ce chapitre n'est pas terminer";
            action = 'terminer';
        }
        else {
            nouveauContenu = 'indiquer que ce chapitre est terminer';
            action = 'noTerminer';
        }
        xhr.onreadystatechange = function () {


            if (this.readyState == 4 && this.status == 200) {
                console.log(this.response);
                console.log(action);
                terminer.classList.toggle('btnTerminer');
                terminer.classList.toggle('btnNotTerminer');
                terminer.innerHTML = nouveauContenu;

                return true;
            }
        }
        var url = "terminer.php?action=" + action;
        xhr.open("get", url, true);

        xhr.responseType = "json";
        //var donnees="action:"+action;
        //  var data="action="+action;
        xhr.send();
    })
}
/////malika***************************
function genererCertificat() {
    const certificat = document.getElementById("mon_cerificat");
    html2pdf().from(certificat).save();
}

var formation = new Array();
for (var i = 0; i < 25; i++) {
    formation[i] = i;
}
function afficherFormation(j) {
    var t = document.getElementById('formation').textContent;
    document.getElementById('formation').innerText = formation[j];

}
function afficherMenu() {
    console.log("jjjjjjjjjjjjjjj");
    var ldiv = document.getElementsByClassName('fleche');
    for (var i = 0; i < 2; i++) {
        console.log("jjjjjjjjjjjjjjj");
        //  l[i].classList.toggle('liActive');
        ldiv[i].classList.toggle('hiddenMenu');

    }
    var menu = document.getElementById('menu');
    menu.classList.toggle('hiddenMenu');
    var hr = document.getElementById('Hr');
    hr.classList.toggle('hr2');
}
/*****************exam*******************************/

if (document.getElementById("enregistrer")) {

    setInterval(() => {
       // var XMLHttpRequest = require("xmlhttprequest").XMLHttpRequest;
      var xhr = new  XMLHttpRequest();
      xhr.open("GET","timeResponse.php",false);
      xhr.send(null);
      document.querySelector("#temps").innerHTML = xhr.responseText;

        if (xhr.responseText == "00:00:00") {
            document.getElementById("enregistrer").click();
        }
    }, 1000)
}

//commencer test
if(document.getElementById("commencerTest")){
    document.getElementById("commencerTest").addEventListener('click', ()=>{

       window.location.href='firstExam.php';
         
      })

}

if(document.getElementById("retourTest")){
    document.getElementById("retourTest").addEventListener('click', ()=>{

       window.location.href='contenu.php';
         
      })

}
if(document.getElementById("telechargerCertificat")){
    document.getElementById("telechargerCertificat").addEventListener('click', ()=>{

       window.location.href='certificat.php';
         
      })

}