<?php 
include_once('configPDO.php');
include_once('classarticles.php');

$id=$_POST['id'];

$connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

    $locale = ("DELETE From articles
                Where id=$id ;");

    $request = $connec->prepare($locale);

    $request->execute();


?>