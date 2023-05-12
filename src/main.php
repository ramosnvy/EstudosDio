<?php

require 'Produtos.php';

use src\Produtos;

$produtos = new Produtos();

switch ($_GET['operacao']){
    case 'list':
        $produtos->list();
        break;
    case 'delete':
        $value = $_GET['descricao'];
        $status = $produtos->delete($value);
        if (!$status){
            echo "Não foi possivel realizar a operação";
            return false;
        }

        echo "Registro alterado com sucesso";

        break;
    case 'insert':
        $value = $_GET['descricao'];
        $status = $produtos->insert($value);
        if (!$status){
            echo "Não foi possivel realizar a operação";
            return false;
        }

        echo "Registro alterado com sucesso";

        break;
    case 'update':
        $descricao = $_GET['descricao'];
        $id = $_GET['id'];
        $status = $produtos->update($descricao, $id);
        if (!$status){
            echo "Não foi possivel realizar a operação";
            return false;
        }

        echo "Registro alterado com sucesso";

        break;
}