
<?php



require_once('connexion.php');



$search = $_GET['search'] ?? null;
if ($search) {
    $query = $db->query('
    select * from (
    select m.id, m.name, m.release, m.duration, GROUP_CONCAT(c.name SEPARATOR \', \') as categories from movie as m
    left join category_movie as cm on cm.movie_id = m.id
    left join category as c on c.id = cm.category_id
    group by id) as t where name like "%'.$search.'%" or categories like "%'.$search.'%"
    ');
} else {
    $query = $db->query('select m.id, m.name, m.release, m.duration, GROUP_CONCAT(c.name SEPARATOR \', \') as categories from movie as m
    left join category_movie as cm on cm.movie_id = m.id
    left join category as c on c.id = cm.category_id
    group by id');
}

$movies = $query->fetchAll(PDO::FETCH_ASSOC);


//print_r($movies);
//print_r($categories);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
<div class="container-fluid">

<div class="d-flex">
            <div class="p-2 flex-grow-1">
                <form method="get" action="">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="search"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search" name="search" id="search">
                    </div>
                </form>
            </div>
            <div class="p-2">
                <a href="movie_edit.php" class="btn btn-success m-3">Ajouter</a>
            </div>
        </div>

    <table class="table table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Categories</th>
            <th>Release</th>
            <th>Duration</th>
            <th>Action</th>

        </tr>
        <?php if($query->rowCount()===0){
        echo '<tr> <Td colspan=6  style="text-align:center;"> Aucun enregistrement !!</TD></tr>';
}?>
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td><?= $movie['id'] ?></td>
                    <td><?= $movie['name'] ?></td>
                    <td><?= $movie['categories'] ?></td>
                    <td><?= $movie['release'] ?></td>
                    <td><?= $movie['duration'] ?></td>
                    <td>
                        <a onclick="return confirm('Voulez-vous vraiment supprimer cet élement ?')" href="movie_remove.php?id=<?= $movie['id'] ?>" class="btn btn-danger">SUPPRIMER</a>
                        <a href="movie_edit.php?id=<?= $movie['id'] ?>" class="btn btn-primary">MODIFIER</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
</body>

</html>