<?php
require_once ('connexion.php');

//echo get_class($db),exit;

if (!isset($_POST['name']) || empty($_POST['name'])){
    echo 'le nom est obligatoire';
    exit;
}
$name=$_POST['name'];
$db-> query ('insert into category (name) values ("'.$name.'")');exit;


