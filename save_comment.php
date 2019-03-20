<?php
function getComment() {

date_default_timezone_set('UTC');
$date_creat=date('Y-m-d');

      if(isset($_POST['comment'])){
      $commentaire=$_POST['comment'];  


      $connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

      $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $request = $connec->prepare("INSERT INTO commentaire(date_creat,commentaire)
                                 VALUES ('$date_creat','$commentaire')");
    //  var_dump("INSERT INTO commentaire(date_creat,commentaire) VALUES ($date_creat','$commentaire')");
      $request->execute();
      
      echo $date_creat;
      echo $commentaire;
      }
      else {
         echo 'False';
      }
}

getComment();

?>