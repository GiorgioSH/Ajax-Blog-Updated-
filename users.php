<?php

include_once('classusers.php');
include_once('configPDO.php');

function allUsers(){
    
  /*  $host = 'localhost';
    $dbname = 'BLOG';
    $user = 'root';
    $password = '1234';
    $DSN = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
    $database = new PDO($DSN, $user, $password);
   */ 
    $database = new PDO(DSN, user, password);
$locate = ("SELECT * FROM users");
$prepared_request = $database -> prepare ($locate);

// bindParam associe :nom dans la requete à $nom_emetteur
//$prepared_request -> bindParam(':prenom' , $prenom, PDO::PARAM_STR, 12);

$prepared_request -> execute();
// On recupere sous forme de tablaue avec fetch.
$users = $prepared_request -> fetchAll();
// On recupere les donnes du case..
$prepared_request -> closeCursor();

return $users;
}

$users=allUsers();



?>

<!-- FORMULAIRE -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="users-ajax.js"></script>
</head>
<body>
    <div class="div1">
        <label for="name">nom :</label>
        <input type="text" id ="nom" name="nom" rows="2" cols="10">
    
        <label for="name">prenom :</label>
        <input type="text" id="prenom" name="prenom" rows="2" cols="10">

        <label for="name">email :</label>
        <input type="text" id="email" name="email" rows="2" cols="10">

        <input type="submit" value="Ajouter" onclick="create_user()">

    </div>


    <!-- LISTE DES UTILISATEURS -->
    <h1> UTILISATEURS </h1>

    <div id="div2">

    <?php foreach ($users as $key => $value):?>

        <p id="<?php echo $value['id'];?>" >
        
        <?php echo $value['id'].$value['nom'].$value['prenom'].$value['email']; ?>

        <input type="button" value="READ" onclick="read(<?php echo $value['id'];?>)">

        <input type="button" value="UPDATE" onclick="update(<?php echo $value['id'];?>)">

        <input type="button" value="DELETE" onclick="supprimer(<?php echo $value['id'];?>)">  </p>

    <?php endforeach ?> 
    </div>


</body>
</html>