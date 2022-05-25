
<?php
require_once('connexion.php');

$movieId = $_POST['movie_id'] ?? null;
if ($movieId == null) {
    header('location: movie_list.php');
    exit;
}
$categories = $_POST['categories'] ?? null;

$queryDelete = $db->query('delete from category_movie where movie_id = ' . $movieId);

if ($categories != null && count($categories) > 0) {
    foreach($categories as $categoryId){
        $queryInsert = $db
        ->query("insert into category_movie (`movie_id`, `category_id`) values ($movieId, $categoryId)");
    }

    header('location: movie_edit.php?id='.$movieId);
}