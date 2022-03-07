<?php

//récupérer l'id si ID.

//$id=isset($_get['id']) ? $_GET['id'] : null;
$id=$_GET['id']  ?? null;


//forcer le type
$id = (int) $id;

// si l'id existe
if(isset($id)){

        // Récupérer la connexion BDD
        require_once ('connexion.php');

        //Requete pour récupérer la catégorie
        $req= $db->query('select*from category where id='.$id.'')or die (print_r($db->errorInfo()));
        while ($donnees=$req->fetch()){
        // print_r(catégorie)
        print_r($donnees['name']);       
        }

//       $query = $db->query ('update category set name='.$_POST['name'].'  where id='.$id);

 
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="category_save.php" method="POST">
        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?=$donnees['name'] ?? '' ?>" placeholder="Placez ici votre nom de catégorie">


        </div>
        <div>
            <input type="submit" value="Envoyer">
        </div>
    </form>
</body>
</html>