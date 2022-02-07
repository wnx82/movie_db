<?php
//phpinfo();

// PDO  https://www.php.net/manual/en/pdo.connections.php

use JetBrains\PhpStorm\Internal\PhpStormStubsElementAvailable;

$user= 'eleve';
$pass= 'eleve';

try {
    $dbh = new PDO('mysql:host=localhost;port=3307;dbname=movie_db', $user, $pass);
    echo 'ça marche';
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}