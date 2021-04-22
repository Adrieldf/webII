<?php

include_once('Dao.php');

class ProdutoDao extends Dao
{
    private $table_name = 'w2produto';

    public function insert($produto)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, descricao, foto, fornecedor) VALUES" . " (:nome, :descricao, :foto, :fornecedor)";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":foto", $produto->getFoto());
        $stmt->bindValue(":fornecedor", $produto->getFornecedor()->getId());

        try {
            $stmt->execute();
            $id = $this->conn->lastInsertId();
            print_r($id);
            return $id;
        }catch ( PDOException $Exception){
            print_r($Exception->getMessage( ) . '' . $Exception->getCode( ));
        }
    }
}