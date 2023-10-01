function myFunction(id) {
    var xhr = new XMLHttpRequest();
     xhr.onreadystatechange = function (){
         
       if(this.readyState == 4 && this.status == 200){
       console.log(this.response);
    for(i=1;i<id+1;i++){
      document.getElementById(i).classList.add('active');
      }
      for(j=i;i<6;i++){
         document.getElementById(i).classList.remove('active');
         }

            return true;
         }
        }
    
    var url="valeurAvis.php?ID="+id;
     xhr.open("GET",url,true);
     xhr.responseType = "json";
     xhr.send();
  }