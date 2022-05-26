<?php


require_once('connexion.php');

$id = $_GET['id'] ?? null;
$category = null;



if ($id != null) {
    $query = $db->query('select * from category where id=' . $id);
    $category = $query->fetch(PDO::FETCH_ASSOC);
    $url = '?id=' . $id;
} else {
    $url = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>

    <form action="category_save.php<?= $url ?>" method="post">
        <div>
            <div class="mb-3">
                <label for="Category" class="form-label">Categorie</label>
                <input type="text" class="form-control" value="<?= $category['name'] ?? '' ?>" id="Category" name="name" placeholder="Placez ici le nom de la catégorie">

                <div>
                    <input type="submit" class="btn btn-primary m-2" value="Envoyer">
                </div>
    </form>

</body>

</html>