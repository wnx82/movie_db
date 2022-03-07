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
} else {
    $query = $db->query('insert into category (name) values ("' . $name . '")');
}


header('location:category_list.php');



/*var_dump($result);
print_r($db->errorInfo());*/