<?php
require_once('connexion.php');

//echo get_class($db),exit;

$id = $_GET['id'] ?? null;

if (!isset($_POST['name']) || empty($_POST['name'])) {
    echo 'le nom est obligatoire';
    exit;
}
$name = $_POST['name'];

if ($id != null) {
    $query = $db->query("update category set name='$name' where id=$id");
    echo "Catégorie $id mise à jour";
} else {
    $query = $db->query('insert into category (name) values ("' . $name . '")');
    echo "categorie créée";
}
header("Refresh:3; url=category_list.php");




/*var_dump($result);
print_r($db->errorInfo());*/