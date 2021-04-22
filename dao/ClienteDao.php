<?php

include_once('Dao.php');

class ClienteDao extends Dao
{
    private $table_name = 'w2cliente';

    public function insert($cliente)
    {
        $query = "INSERT INTO " .
            $this->table_name .
            " (nome, telefone, email1, cartaocredito, rua, numero, complemento, bairro, cep, cidade, estado) VALUES" .
            " (:nome, :telefone, :email, :cartaoCredito, :rua, :numero, :complemento, :bairro, :cep, :cidade, :estado)";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindValue(":nome", $cliente->getNome());
        $stmt->bindValue(":telefone", $cliente->getTelefone());
        $stmt->bindValue(":email", $cliente->getEmail());
        $stmt->bindValue(":cartaoCredito", $cliente->getCartaoCredito());
        $stmt->bindValue(":rua", $cliente->getEndereco()->getRua());
        $stmt->bindValue(":numero", $cliente->getEndereco()->getNumero());
        $stmt->bindValue(":complemento", $cliente->getEndereco()->getComplemento());
        $stmt->bindValue(":bairro", $cliente->getEndereco()->getBairro());
        $stmt->bindValue(":cep", $cliente->getEndereco()->getCep());
        $stmt->bindValue(":cidade", $cliente->getEndereco()->getCidade());
        $stmt->bindValue(":estado", $cliente->getEndereco()->getEstado());

        try {
            $stmt->execute();
            $id = $this->conn->lastInsertId();
            print_r($id);
            return $id;
        }catch ( PDOException $Exception){
            print_r($Exception->getMessage( ) . '' . $Exception->getCode( ));
        }
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $clientes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $endereco = new Endereco($row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
            $cliente = new Cliente($row['id'], $row['nome'], $row['telefone'], $row['email1'], $row['cartaocredito'], $endereco);

            $clientes[] = $cliente;
        }
        return $clientes;
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
            $cliente = new Cliente($row['id'], $row['nome'], $row['telefone'], $row['email1'], $row['cartaocredito'], $endereco);
        }

        return $cliente;
    }

    public function update($cliente) {

        $query = "UPDATE " .
            $this->table_name .
            " SET 
            nome = :nome, 
            telefone = :telefone,
            cartaocredito = :cartaocredito,  
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
        $stmt->bindValue(":id", $cliente->getId());
        $stmt->bindValue(":nome", $cliente->getNome());
        $stmt->bindValue(":telefone", $cliente->getTelefone());
        $stmt->bindValue(":email", $cliente->getEmail());
        $stmt->bindValue(":cartaocredito", $cliente->getCartaoCredito());
        $stmt->bindValue(":rua", $cliente->getEndereco()->getRua());
        $stmt->bindValue(":numero", $cliente->getEndereco()->getNumero());
        $stmt->bindValue(":complemento", $cliente->getEndereco()->getComplemento());
        $stmt->bindValue(":bairro", $cliente->getEndereco()->getBairro());
        $stmt->bindValue(":cep", $cliente->getEndereco()->getCep());
        $stmt->bindValue(":cidade", $cliente->getEndereco()->getCidade());
        $stmt->bindValue(":estado", $cliente->getEndereco()->getEstado());

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}