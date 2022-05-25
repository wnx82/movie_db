<?php



require_once('connexion.php');
$query = $db->query('select * from movie');
echo "<pre>";
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
    <title>Document</title>
</head>

<body>
<div class="container-fluid">

<a href="movie_edit.php" class="btn btn-success m-3">Ajouter</a>
    <table class="table table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Release</th>
            <th>Duration</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
        <?php if($query->rowCount()===0){
        echo '<tr> <Td colspan=6  style="text-align:center;"> Aucun enregistrement !!</TD></tr>';
}?>
        <?php foreach ($movies as $movie) : ?>
            <tr>
                <td><?= $movie['id'] ?></td>
                <td><?= $movie['name'] ?></td>
                <td><?= $movie['release'] ?></td>
                <td><?= $movie['duration'] ?></td>

                <td><a href="movie_edit.php?id=<?= $movie['id'] ?>"><button class="btn btn-primary">Editer</button></A></td>
                <td><a onclick="return confirm('Voulez vous vraiment supprimer cet élément?')" href="movie_remove.php?id=<?= $movie['id'] ?>"><button class="btn btn-danger">Supprimer</button></A></td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>

</html>