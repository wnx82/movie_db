<?php

require_once('connexion.php');

$id = $_GET['id'] ?? null;

if ($id == null) {
    return header('location: movie_list.php');
}
// FORCER LE TYPE
$id = (int) $id;

$query = $db->query('delete from movie where id=' . $id);

if ($query == false) {
    exit('Une errreur s\'est produite, veuillez réessayer plus tard !');
}

if ($query->rowCount() === 0) {
    exit('Enregistrement inconnu !!!');
}

return header('location: movie_list.php');