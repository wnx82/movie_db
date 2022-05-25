<?php

require_once ('connexion.php');

// coalesce => ?? vérifier
$id= $_GET['id'] ?? null;

if($id==null){

   return header('location: movie_list.php');
}

// forcer le type pour éviter les codes malicieux via le query (sql)

$id=(int) $id ;

$query = $db-> query ('delete from movie where id='.$id.'');

if($query == false) {
exit ( "une erreur s'est produite");
}
if($query->rowcount() === 0) {
    exit ("Enregistrement inconnu !!!");
}
return header('location: movie_list.php');

//exit ou die, replace echo + exit