<?php
// connexion à la base 
require_once ('connexion.php');

//$id=isset($_get['id']) ? $_GET['id'] : null;
$id=$_GET['id']  ?? null;

//si l'id est null => liste
if($id == null){
    return header('location: category_list.php');
}
//forcer le type
$id = (int) $id;

//code supprimer
$query = $db->query ('delete from category where id='.$id);

//si il y a une erreur
if($query == false){
    exit('Une erreur s\'est produite, veuillez réessayer plus tard !');
}

//si 0 ligne traitée
if($query->rowCount()===0){
    exit('Enregistrement inconnu !!');
}


return header('location: category_list.php');
