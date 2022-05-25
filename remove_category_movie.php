<?php

require_once('connexion.php');

$movieId  = $_GET['movie_id'] ?? null;
$categoryId  = $_GET['category_id'] ?? null;

if ($movieId == null || $categoryId == null) {
    header('location: movie_list.php?id=' . $movieId);
    exit;
}

$query = $db->query("delete from category_movie where movie_id=$movieId and category_id=$categoryId");

if ($query->rowCount() == 0) {
    echo "Aucun enregistrement supprimé !!!!";
    exit;
}

header('location: movie_edit.php?id=' . $movieId);