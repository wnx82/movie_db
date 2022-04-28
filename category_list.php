<?php

require_once('connexion.php');

$query = $db->query('select * from category');

$categories = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <table class="table table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>ACTION</th>
        </tr>
    <?php foreach($categories as $category): ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td>
                <a onclick="return confirm('Voulez-vous vraiment supprimer cet élement ?')" 
                href="category_remove.php?id=<?= $category['id'] ?>" class="btn btn-danger">SUPPRIMER</a>
                <a href="category.php?id=<?= $category['id'] ?>" class="btn btn-primary">MODIFIER</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </table>

</body>
</html>