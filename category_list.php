<?php

require_once('connexion.php');
$query = $db->query('select * from category');
echo "<pre>";
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

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
<button class="btn btn-primary">dddddd</button>
    <table class="table table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
        <?php foreach($categories as $category): ?>
            <tr>
                <td><?=$category['id'] ?></td>
                <td><?=$category['name'] ?></td>
                <td><a href="category.php?id=<?=$category['id'] ?>"><button class="btn btn-primary">Editer</button></A></td>
                <td><a onclick="return confirm('Voulez vous vraiment supprimer cet élément?')" href="category_remove.php?id=<?=$category['id'] ?>"><button class="btn btn-danger">Supprimer</button></A></td>

            </tr>
        <?php endforeach; ?>    
    </table>

</body>
</html>
