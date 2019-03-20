function sendArticle(){

    var title=document.getElementById('title').value;
    var content=document.getElementById('content').value;


    var XBH = new XMLHttpRequest(); 

    XBH.onreadystatechange= function() {
     
        if (XBH.readyState == 4 && XBH.status ==200) {

        var reponse = XBH.responseText;

            var newelement = document.createElement("p");

            var bigdiv = document.getElementById("div3");

            parent.appendChild(newelement);

            var title=document.getElementById("title").value;
            var content=document.getElementById("content").value;

            var ensemble=title+""+content;

            ensemble += "<input type='button' value='READ' onclick='read("+id+")'>";
            ensemble += "<input type='button' value='UPDATE' onclick='update("+id+")'>";
            ensemble += "<input type='button' value='DELETE' onclick='supprimer("+id+")'>";

            document.getElementById("div3").lastChild.innerHTML += ensemble;
        }
    }  
    
    XBH.open('POST','save_titlecontent.php');

    var data = new FormData(); 

    data.append('title',document.getElementById('title').value);
    data.append('content',document.getElementById('content').value);
    
    XBH.send(data);
    
}

function read(id){ 

    var XHA = new XMLHttpRequest();

    XHA.onreadystatechange=function(){ 

        if (XHA.readyState == 4 && XHA.status ==200) {   
        var reponse = XHA.responseText;
        var title= JSON.parse(XHA.response).title;
        var content=JSON.parse(XHA.response).content;

        document.getElementById('title').value=title;
        document.getElementById('content').value=content;

    }

    };

    XHA.open('POST','readArticle.php');

    var data = new FormData(); 
        data.append('id',id);
        
    XHA.send(data);
    }
    
function update(id){ 

    var XUA = new XMLHttpRequest();

    XUA.onreadystatechange=function(){

        if(XUA.readyState ==4 && XUA.status==200 ){ 

            // var titre= JSON.parse(XUA.response).title;
            // var contenu= JSON.parse(XUA.response).content;

            document.getElementById("div3").removeChild(document.getElementById(id));

            var newchild= document.createElement("p"); 
            var bigdiv= document.getElementById("div3");

            var title=document.getElementById("title").value;
            var content=document.getElementById("content").value;

            var ensemble= title+" "+content;

            ensemble += "<input type='button' value='READ' onclick='read("+id+")'>";

            ensemble += "<input type='button' value='UPDATE' onclick='update("+id+")'>";

            ensemble += "<input type='button' value='SUPPRIMER' onclick='supprimer("+id+")'>";

            newchild.innerHTML = ensemble; 

            bigdiv.insertBefore(newchild,bigdiv.firstChild);


        }

    };

    XUA.open('POST','update.Article.php'); 
    
    var data = new FormData();
        data.append('id',id);
        data.append('title',document.getElementById('title').value);
        data.append('content',document.getElementById('content').value);

    XUA.send(data);
}

function supprimer(id){

    var XSA = new XMLHttpRequest(); 

    XSA.onreadystatechange=function(){

    if (XSA.readyState ==4 && XSA.status==200 ){

        var newchild = document.getElementById(id);
        var bigdiv = document.getElementById("div3");

        
        bigdiv.removeChild(newchild);

    }
    };

    XSA.open('POST','supprimer.article.php');

    var data = new FormData();

        data.append('id',id);

    XSA.send(data);
}