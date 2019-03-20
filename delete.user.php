<?php 


include_once('configPDO.php'); 
include_once('classusers.php');

$id= $_POST['id'];
    $connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

    $locale = ("DELETE From users 
                Where id=$id ;");
                
    $request = $connec->prepare($locale);

  //  var_dump("INSERT INTO commentaire(date_creat,commentaire) VALUES ($date_creat','$commentaire')");

    $request->execute();


?>