<?php
require_once('connexion.php');
$movieId = $_GET['id'] ?? null;

if ($movieId != null) :


$suppidcat = $_GET['suppcat'] ?? null;
if(isset($suppidcat))
{
    $query = $db-> query('delete from category_movie where category_id='.$suppidcat.'');
}
    $query = $db->query('SELECT cm.*, c.name FROM movie_db.category_movie as cm
join category as c on c.id = cm.category_id
where movie_id=' . $movieId);

    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
    <h3>Catégories</h3>
    <a href="associate_movie_category.php?movie_id=<?=$movieId?>" class="btn btn-success btn-sm mt-3 mb-3">Ajouter</a>
    <ul class="list-group">
        <?php foreach($categories as $c):  ?>
        <li class="list-group-item">
            <div class="d-flex bd-highlight">
                <div class="bd-highlight"><?= $c['name']?></div>
                <div class="ms-auto bd-highlight">
                    <a href="remove_movie_category.php?movie_id=<?=$movieId?>&category_id=<?= $c['category_id']?>" class="btn btn-danger btn-sm">S</a>
                </div>
            </div>
        </li>


        <?php endforeach; ?>
    </ul>
<?php
endif
?>