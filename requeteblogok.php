<?php 
include_once('configPDO.php');
include_once('classarticles.php');


$connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $locale = ("SELECT * from articles order by id desc limit 3");
    $request = $connec->prepare($locale);
  
    $request->execute();
    
    $request->setFetchMode(PDO::FETCH_CLASS, 'Article');

    $result = $request->fetchAll();

    echo (json_encode($result));


?>