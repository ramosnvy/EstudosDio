<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = "update produtos set descricao = ? where id = ?";

$response = $pdo->prepare($sql);

$response->bindParam(1, $_GET['descricao']);
$response->bindParam(2, $_GET['id']);

$response->execute();

echo $response->rowCount();