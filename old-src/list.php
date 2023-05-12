<?php

declare (strict_types=1);

$pdo = require 'connect.php';

$sql = "select * from `produtos`";

echo '<h1> Produtos: </h1>';

foreach ($pdo->query($sql) as $key => $value){
    echo 'Id: ' . $value['id'] . '<br> Descrição:' . $value['descricao'] . '<hr>';
}

$teste = $pdo->query($sql);

