<?php
//phpinfo();

// PDO  https://www.php.net/manual/en/pdo.connections.php

use JetBrains\PhpStorm\Internal\PhpStormStubsElementAvailable;

$user= 'eleve';
$pass= 'eleve';

try {
    $db = new PDO('mysql:host=localhost;port=3307;dbname=movie_db', $user, $pass);
    //echo 'ça marche';
} catch (PDOException $e) {
    //echo 'Le site est en maintenance, erreur bdd';
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}