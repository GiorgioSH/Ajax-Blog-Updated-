<?php

include_once('configPDO.php');
include_once('classusers.php');

    $id=$_POST['id'];

    $connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $locale = ("SELECT * from users where id=$id");
    $request = $connec->prepare($locale);
  //  var_dump("INSERT INTO commentaire(date_creat,commentaire) VALUES ($date_creat','$commentaire')");
    $request->execute();
    
    $request->setFetchMode(PDO::FETCH_CLASS, 'User');

    $hmar = $request->fetch();

    echo (json_encode($hmar));


?>