<?php
require_once('connexion.php');

$movieId = $_GET['movie_id'] ??  null;
if($movieId == null){
    header('location: movie_list.php');
    exit;
}

$query = $db->query("select id, name, 
IF(category_id is null,0, 1) as isSelected
 from(
	select * from category as c
	left join category_movie as cm on cm.category_id = c.id and cm.movie_id=$movieId
) as t order by id desc");

$categories = $query->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Catégories</h1>
        <div class="row mt-3">
            <div class="col">
                <form action="save_associate_movie_category.php" method="post">
                    <input type="hidden" name="movie_id" value="<?= $movieId ?>">
                    <ul class="list-group">
                        <?php foreach($categories as $category): ?>
                            <li class="list-group-item">
                                <input
                                    <?= $category['isSelected'] ? 'checked' : ''?>
                                class="form-check-input me-1" name="categories[]" type="checkbox" value="<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <button class="btn btn-primary mt-3" type="submit">Sauvegarder</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>