<?php

require_once('connexion.php');


$id = $_GET['id'] ?? null;
function validation($key, $message)
{
    if (isset($_POST[$key]) == false || empty($_POST[$key])) {
        echo $message;
        exit;
    }
}


validation("name", "Le nom est obligatoire");
validation("release", "La release est obligatoire");
validation("duration", "La durée est obligatoire");

$movie = $_POST;

$movie = $_POST;
if($id == null){
    $query = $db->query('insert into movie (`name`, `release`, `duration`) values ("'.$movie['name'].'", "'.$movie['release'].'", '.$movie['duration'].')');
} else {
    $query = $db->query('update movie set `name` ="'.$movie['name'].'" , `release`="'.$movie['release'].'", `duration`="'.$movie['duration'].'" where id='.$id);
}

header('location: movie_list.php');

