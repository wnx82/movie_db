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
            <label>Name</label>
            <input type="text" value="<?= $category['name'] ?? '' ?>" name="name" placeholder="Placez ici votre nom">
        </div>
        <div>
            <input type="submit" value="Envoyer">
        </div>
    </form>
</body>

</html>