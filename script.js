function genererCertificat(){
 const certificat= document.getElementById("mon_cerificat");
 html2pdf().from(certificat).save();
}

var formation=new Array();
for(var i=0;i<25;i++){
    formation[i]=i;
}
function afficherFormation( j){
   var t= document.getElementById('formation').textContent;
document.getElementById('formation').innerText=formation[j];

}
function afficherMenu(){
    console.log("jjjjjjjjjjjjjjj");
    var ldiv=document.getElementsByClassName('fleche');
    for(var i=0;i<2;i++){
        console.log("jjjjjjjjjjjjjjj");
          //  l[i].classList.toggle('liActive');
          ldiv[i].classList.toggle('hiddenMenu');
           
        }
        var menu=document.getElementById('menu');
        menu.classList.toggle('hiddenMenu');
        var hr=document.getElementById('Hr');
        hr.classList.toggle('hr2');
}