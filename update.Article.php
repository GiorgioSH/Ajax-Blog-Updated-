<?php
include_once('configPDO.php');
include_once('classarticles.php');


$id=$_POST['id'];
$title=$_POST['title'];
$content=$_POST['content'];

$connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

$locale = ("UPDATE articles 
            Set title='$title', content='$content' 
            Where id=$id ;");
$request = $connec->prepare($locale);
//  var_dump("INSERT INTO commentaire(date_creat,commentaire) VALUES ($date_creat','$commentaire')");
$request->execute();


$locale = ("SELECT * from articles where id=$id");
    $request = $connec->prepare($locale);

    $request->execute();
    
     
    $request->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $maj1 = $request->fetch();

    echo (json_encode($maj1));
    

?> 