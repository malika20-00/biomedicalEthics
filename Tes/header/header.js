const drop = document.querySelector('.btnn');
const liste = document.querySelector('.drop-down');
drop.addEventListener('click',function(){

    if(liste.classList.contains("hidden")){
      
    }
    liste.classList.toggle("hidden");
})

// ****************Encours********************
const active = document.querySelectorAll(".links li a");

active.forEach(item =>{ 
    
    const li = item.parentElement;
   
    item.addEventListener('click',function(){
      active.forEach(i=>{
           
            i.parentElement.classList.remove('encours');


        })
        li.classList.add("encours");
    })
})



/**********************************Menu************************* */

const param = document.querySelector("#param");
const menu = document.querySelector(".petit_menu");
const iDown = document.querySelector("#i");
const iUp = document.querySelector("#chevron-up");
param.addEventListener('click',function(){
    if(menu.style.display == "none" || menu.style.display == "" )
    { 
        menu.style.display = "block";
        iUp.style.display="block";
        iDown.style.display="none";
           }

    else{
       
        menu.style.display = "none";
        iUp.style.display ="none";
        iDown.style.display="block";
    }
})

