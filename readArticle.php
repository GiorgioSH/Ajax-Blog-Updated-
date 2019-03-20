<?php 

    include_once('configPDO.php');
    include_once('classarticles.php');

    $id=$_POST['id'];

    
    $connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $locale = ("SELECT * from articles where id=$id");
    $request = $connec->prepare($locale);
  
    $request->execute();
    
    $request->setFetchMode(PDO::FETCH_CLASS, 'articles');

    $result = $request->fetch();

    echo (json_encode($result));





?>