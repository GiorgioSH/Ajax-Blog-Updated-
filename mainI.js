$("#div1").hide();

var nbr =10000;

$("#bouton1").on("click",function(){
    $.ajax({ 
    url:"requeteblogok.php",
    data: { id : nbr },
    dataType:"json",
    success: function (article){

    var i;
        
        for (i=0; i<=3; i++){ 
    
        var cardarticle = $("#div1").clone();

        $(cardarticle).find("#titre1").text(article[i].title); 
        $(cardarticle).find("#article1").text(article[i].content);
        $(cardarticle).show();
        $(cardarticle).prependTo("#row");
        
    }
    }
}) 
});

// $.ajax({
//     url: "scripts/article.add.php",
//     type: "POST",
//     data: {
//     title : $("#title").val(),
//     content : $("#content").val()
//     },
//     success: function( article ) {
//     console.log(article);
//     },
//     dataType: "json"
//     }
//     )