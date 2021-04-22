<?php

include_once('Dao.php');

class FornecedorDao extends Dao
{
    private $table_name = 'w2fornecedor';

    public function insert($fornecedor)
    {
        $query = "INSERT INTO " .
            $this->table_name .
            " (nome, descricao, telefone, email1, rua, numero, complemento, bairro, cep, cidade, estado) VALUES" .
            " (:nome, :descricao, :telefone, :email, :rua, :numero, :complemento, :bairro, :cep, :cidade, :estado)";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindValue(":nome", $fornecedor->getNome());
        $stmt->bindValue(":descricao", $fornecedor->getDescricao());
        $stmt->bindValue(":telefone", $fornecedor->getTelefone());
        $stmt->bindValue(":email", $fornecedor->getEmail());
        $stmt->bindValue(":rua", $fornecedor->getEndereco()->getRua());
        $stmt->bindValue(":numero", $fornecedor->getEndereco()->getNumero());
        $stmt->bindValue(":complemento", $fornecedor->getEndereco()->getComplemento());
        $stmt->bindValue(":bairro", $fornecedor->getEndereco()->getBairro());
        $stmt->bindValue(":cep", $fornecedor->getEndereco()->getCep());
        $stmt->bindValue(":cidade", $fornecedor->getEndereco()->getCidade());
        $stmt->bindValue(":estado", $fornecedor->getEndereco()->getEstado());


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