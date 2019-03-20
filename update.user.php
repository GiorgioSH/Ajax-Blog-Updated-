<?php 
include_once('configPDO.php'); 
include_once('classusers.php');

    $id=$_POST['id'];
    $email=$_POST['email'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];



    //ON SE CONNECTE A LA TABLE ET ON MODIFIE 
    $connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

    $locale = ("UPDATE users 
                Set nom='$nom', email='$email', prenom='$prenom' 
                Where id=$id ;");
    $request = $connec->prepare($locale);

    $request->execute();



    //APRES LA MODIFICATION ON AFFICHE LA NOUVELLE TABLE

    $connec = new PDO("mysql:dbname=BLOG", 'root', '1234');
    $locale = ("SELECT * from users where id=$id");
    $request = $connec->prepare($locale);

    $request->execute();
    
     
    $request->setFetchMode(PDO::FETCH_CLASS, 'User');
    $maj1 = $request->fetch();

    echo (json_encode($maj1));
    



?>