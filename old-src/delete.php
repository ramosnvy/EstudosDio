<?php

declare(strict_types=1);

$pdo = require 'connect.php';

$sql = "DELETE FROM produtos WHERE descricao='Teste'";
$prepare = $pdo->prepare($sql);


$prepare->execute();

echo $prepare->rowCount();
