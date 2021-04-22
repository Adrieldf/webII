<?php

include_once('Dao.php');

class FornecedorDao extends Dao
{
    private $table_name = 'w2fornecedor';

    public function insert($fornecedor)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, descricao, telefone, email) VALUES" . " (:nome, :descricao, :telefone, :email)";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindValue(":nome", $fornecedor->getNome());
        $stmt->bindValue(":descricao", $fornecedor->getDescricao());
        $stmt->bindValue(":telefone", $fornecedor->getTelefone());
        $stmt->bindValue(":email", $fornecedor->getEmail());

        try {
            $stmt->execute();
            $id = $this->conn->lastInsertId();
            print_r($id);
            return $id;
        } catch (PDOException $Exception) {
            print_r($Exception->getMessage() . '' . $Exception->getCode());
        }
    }
}