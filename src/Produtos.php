<?php

namespace src;

use Exception;
use PDO;

class Produtos
{
  public $pdo;
    
    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:localhost=mysql;dbname=aula', 'root', '');
        } catch (Exception $exception){
            echo $exception->getMessage();
            die();
        }
    }
    
    
    public function delete(String $value): int
    {

        $sql = "DELETE FROM produtos WHERE descricao='$value'";
        $prepare = $this->pdo->prepare($sql);


        $prepare->execute();

        return $prepare->rowCount();
    }

    public function insert(String $descricao): int
    {

        $sql = 'insert into produtos(descricao) values(?)';
        $prepare = $this->pdo->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->execute();

        return $prepare->rowCount();
        
    }

    public function list()
    {

        $sql = "select * from `produtos`";

        echo '<h1> Produtos: </h1>';

        foreach ($this->pdo->query($sql) as $key => $value){
            echo 'Id: ' . $value['id'] . '<br> Descrição:' . $value['descricao'] . '<hr>';
        }

    }

    public function update(String $descricao, Int $id): int
    {
        $sql = "update produtos set descricao = ? where id = ?";

        $response = $this->pdo->prepare($sql);

        $response->bindParam(1, $descricao);
        $response->bindParam(2, $id);

        $response->execute();

        return $response->rowCount();
    }
}