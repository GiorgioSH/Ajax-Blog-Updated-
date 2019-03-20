<?php

include_once('configPDO.php');


function insertUser() {

    if(isset($_POST['nom'])){
        $nom=$_POST['nom'];
    if(isset($_POST['prenom'])){
        $prenom=$_POST['prenom'];
    if(isset($_POST['email'])){
        $email=$_POST['email'];
    

    $connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $request = $connec->prepare("INSERT INTO users (nom,prenom,email)
                               VALUES ('$nom','$prenom','$email')");
  //  var_dump("INSERT INTO commentaire(date_creat,commentaire) VALUES ($date_creat','$commentaire')");
    $request->execute();
    
    $id=$connec->lastInsertId();
  /* echo $date_creat;
    }
    else {
       echo 'False';
    
        }
  */
      }
  }
}
echo $id;
 // echo ($nom." ".$prenom." ".$email);
}
insertUser();



?>