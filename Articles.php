<?php
include_once('configPDO.php');
include_once('classarticles.php');
include_once('response.php');
include_once('response_success.php');
include_once('response_fail.php');



function allArticles(){
    
  /*  $host = 'localhost';
    $dbname = 'BLOG';
    $user = 'root';
    $password = '1234';
    $DSN = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
    $database = new PDO($DSN, $user, $password);
   */ 
    $database = new PDO(DSN, user, password);
$locate = ("SELECT id,title,content FROM articles ORDER BY id DESC;");
$prepared_request = $database -> prepare ($locate);

// bindParam associe :nom dans la requete à $nom_emetteur
//$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

$prepared_request -> execute();
// On recupere sous forme de tablaue avec fetch.
$articles = $prepared_request -> fetchAll();
// On recupere les donnes du case..
$prepared_request -> closeCursor();

return $articles;
}

$articles=allArticles();


?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main1.css">
    <script src="requetearticles.js"></script>
</head>
<body>

    <div id="div1">
    
        <label>title</label>
        <input type="text" id="title" name="title">

        <label>Content</label><br>   
        <textarea type="text" id="content" name="content" rows="10" cols="100"></textarea>
        <input type="submit" value="Ajouter" onclick="sendArticle()">
        
    </div>


    <div id="div3">

        <?php foreach ($articles as $key => $value):?>

            <p id="<?php echo $value['id'];?>" >
            
            <?php echo $value['id'].$value['title'].$value['content']; ?>

            <input type='button' value='READ' onclick="read(<?php echo $value['id'];?>)">

            <input type='button' value='UPDATE' onclick="update(<?php echo $value['id'];?>)">

            <input type='button' value='SUPPRIMER' onclick="supprimer(<?php echo $value['id'];?>)"></p>

        <?php endforeach ?>

    </div>




</body>
</html>