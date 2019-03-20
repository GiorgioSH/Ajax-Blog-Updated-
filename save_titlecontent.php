<?php
include_once('configPDO.php');
//ON FAIT APPEL A NOTRE BASE DE DONNEES AVEC LA METHODE PDO 
include_once('response.php');
include_once('response_success.php');
include_once('response_fail.php');

$response1 = new ResponseSuccess(true,"article valide",null);
echo json_encode($response1);

$response2 = new ResponseFail(false,"article non valide",null);
echo json_encode($response2);

function getArticles() {

      if(isset($_POST['content'])){
      $content=$_POST['content'];
      if(isset($_POST['title'])){
          $title=$_POST['title'];
      


      $connec = new PDO("mysql:dbname=BLOG", 'root', '1234');

      $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $request = $connec->prepare("INSERT INTO articles(title,content)
                                 VALUES ('$title','$content')");
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
    echo ($id." ".$content." ".$title);
}
getArticles();



?>