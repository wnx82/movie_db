<?php


require_once('connexion.php');


$movieId = $_GET['movie_id'];
$rating = $_POST['rating'] ?? null;
$comment = $_POST['comment'] ?? null;


if (!empty($rating) && !empty($comment)) {

    if ($rating > 5 || $rating < 0){
        echo "Entrez un chiffre entre 0 et 5";
        exit;
    }ELSE{
        $query = $db->query('insert INTO rate (`rating`,`comment`,`movie_id`) values (' . $rating . ',"' . $comment . '",' . $movieId . ')');
        if ($query == false) {
            echo "Une erreur s'est produite, veuillez réessayer plus tard";
            exit;
        }
    
        header('location:movie_edit.php?id=' . $movieId);

    }
} else {
    echo 'Les champs sont vides';

}


