<?php

include_once('Dao.php');
include_once("../model/Endereco.php");

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
            //print_r($id);
            return $id;
        } catch (PDOException $Exception) {
            print_r($Exception->getMessage() . '' . $Exception->getCode());
        }
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $endereco = new Endereco(NULL,NULL,NULL,NULL,NULL,NULL,NULL,);
        $fornecedores = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $endereco = new Endereco($row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
            $fornecedor = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email1'], $endereco);

            $fornecedores[] = $fornecedor;
        }
        return $fornecedores;
    }

    public function getAllWithPagination($limit, $offset)
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC LIMIT :l OFFSET :o";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindValue(":l", $limit);
        $stmt->bindValue(":o", $offset);

        $stmt->execute();

        $fornecedores = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $endereco = new Endereco($row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
            $fornecedor = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email1'], $endereco);

            $fornecedores[] = $fornecedor;
        }
        return $fornecedores;
    }

    public function getAllByNomeContainingWithPagination($nome, $limit, $offset)
    {
        $nomeContido = "%".$nome."%";
        $query = "SELECT * FROM " . $this->table_name . " WHERE nome LIKE :nomeContido ORDER BY id ASC LIMIT :l OFFSET :o";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":nomeContido", $nomeContido);
        $stmt->bindValue(":l", $limit);
        $stmt->bindValue(":o", $offset);

        $stmt->execute();

        $fornecedores = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $endereco = new Endereco($row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
            $fornecedor = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email1'], $endereco);

            $fornecedores[] = $fornecedor;
        }
        return $fornecedores;
    }

    public function getOneById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $endereco = new Endereco($row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
            $fornecedor = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email1'], $endereco);
        }

        return $fornecedor;
    }

    public function getOneByNome($nome)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nome = :nome";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $fornecedor = new Fornecedor(NULL,NULL,NULL,NULL,NULL,NULL,);

        if ($row) {
            $endereco = new Endereco($row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
            $fornecedor = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email1'], $endereco);
        }

        return $fornecedor;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function update($fornecedor) {

        $query = "UPDATE " .
            $this->table_name .
            " SET 
            nome = :nome, 
            descricao = :descricao, 
            telefone = :telefone, 
            email1 = :email, 
            rua = :rua, 
            numero = :numero, 
            complemento = :complemento, 
            bairro = :bairro, 
            cep = :cep, 
            cidade = :cidade, 
            estado = :estado"  .
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindValue(":id", $fornecedor->getId());
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

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}