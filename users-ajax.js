function create_user(){ 

        var XBH = new XMLHttpRequest(); 
    
        XBH.onreadystatechange= function() {
         
            if (XBH.readyState == 4 && XBH.status ==200) {     
    
            
            var id = XBH.responseText;
    
                var enfant = document.createElement("p");
                var parent = document.getElementById("div2");

                parent.appendChild(enfant);

                var nom = document.getElementById("nom").value;
                var prenom =document.getElementById("prenom").value;
                var email = document.getElementById("email").value;

                    
                var contenu = nom+" "+prenom+" "+email ;

                contenu += "<input type='button' value='READ' onclick='read("+id+")'>";
                contenu += "<input type='button' value='UPDATE' onclick='update("+id+")'>";
                contenu += "<input type='button' value='DELETE' onclick='supprimer("+id+")'>";


                document.getElementById("div2").lastChild.innerHTML += contenu ;
    
            }
        };        
        //prenom=document.getElementById('prenom').value;
        XBH.open('POST','user.add.php'); 
        
    
    
        var data = new FormData(); 
        data.append('nom',document.getElementById('nom').value);
        data.append('prenom',document.getElementById('prenom').value);
        data.append('email',document.getElementById('email').value);
        
        XBH.send(data);
    }
    
function read(id){ 

        var id =id;
        var XBH = new XMLHttpRequest(); 
    
        XBH.onreadystatechange= function() {
         
            if (XBH.readyState == 4 && XBH.status ==200) {     
    
            var nom = JSON.parse(XBH.response).nom;
            var prenom = JSON.parse(XBH.response).prenom;
            var email = JSON.parse(XBH.response).email;    

            document.getElementById("nom").value= nom;
            document.getElementById("prenom").value= prenom;
            document.getElementById("email").value= email;

            }
        };        
        //prenom=document.getElementById('prenom').value;
        XBH.open('POST','read_user.php'); 
        
        var data = new FormData(); 
        data.append('id',id);
        
        XBH.send(data);
    }
        
function update(id) {


        var XBH = new XMLHttpRequest(); 
    
        XBH.onreadystatechange= function() {
         
            if (XBH.readyState == 4 && XBH.status ==200) {     
    
            
            var nom = JSON.parse(XBH.response).nom;
            var prenom = JSON.parse(XBH.response).prenom;
            var email = JSON.parse(XBH.response).email;
            var id = JSON.parse(XBH.response).id;
    

            document.getElementById('div2').removeChild(document.getElementById(id));
            
                var enfant = document.createElement("p");
                var parent = document.getElementById("div2");


                var nom = document.getElementById("nom").value;
                var prenom =document.getElementById("prenom").value;
                var email = document.getElementById("email").value;

                    
                var contenu = nom+" "+prenom+" "+email ;

                contenu += "<input type='button' value='READ' onclick='read("+id+")'>";
                contenu += "<input type='button' value='UPDATE' onclick='update("+id+")'>";
                contenu += "<input type='button' value='DELETE' onclick='supprimer("+id+")'>";

                enfant.innerHTML = contenu ;

                parent.insertBefore(enfant,parent.firstChild);  

            }
        };        
        //prenom=document.getElementById('prenom').value;
        XBH.open('POST','update.user.php'); 
    
        var data = new FormData(); 

        data.append('nom',document.getElementById('nom').value);
        data.append('prenom',document.getElementById('prenom').value);
        data.append('email',document.getElementById('email').value);
        data.append('id',id);
        
        XBH.send(data);
    }

function supprimer(id) {

        var XBH = new XMLHttpRequest(); 
    
        XBH.onreadystatechange= function() {
         
            if (XBH.readyState == 4 && XBH.status ==200) {     
    
            var enfant = document.getElementById(id);
            var parent = document.getElementById("div2");

            
            parent.removeChild(enfant);

            }
        };        
        //prenom=document.getElementById('prenom').value;
        XBH.open('POST','delete.user.php'); 
    
        var data = new FormData(); 

        data.append('id',id);
        
        XBH.send(data);
}


    
