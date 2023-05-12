<?php


$pdo = null;

try {
    $pdo = new PDO('mysql:localhost=mysql;dbname=aula', 'root', '');
} catch (Exception $exception){
    echo $exception->getMessage();
    die();
}


return $pdo;