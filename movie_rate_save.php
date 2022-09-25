<?php

require_once('connexion.php');

$movieId = $_GET['movie_id'];
$rating = $_POST['rating'] ?? null;
$comment = $_POST['comment'] ?? null;


if($rating == null || $comment == null) {
    echo 'Tous les champs sont obligatoires';
    exit;
} else if(preg_match('/[0-9]/', $rating) && $rating < 0 || $rating > 5) {
    echo 'La note doit être comprise entre 0 et 5';
    exit;
} else if(strlen($comment) <= 10) {
    echo 'Le commentaire doit avoir une taille supérieur à 10 car.';
    exit;
}

$query = $db->query('insert into rate (`rating`, `comment`, `movie_id`) values (' . $rating . ', "' . $comment . '", ' . $movieId . ')');

if ($query == false) {
    echo 'Une erreur s\'est produite, veuillez réessayer plus tard !';
    exit;
}

header('location: movie_edit.php?id='.$movieId);