<?php

include_once('dao/Dao.php');

class ClienteDao extends DAO
{
    private $table_name = 'w2cliente';

    public function insert($cliente)
    {

        $query = "INSERT INTO " . $this->table_name . " (nome, telefone, email1, cartaocredito) VALUES" . " (:nome, :telefone, :email, :cartaoCredito)";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindValue(":nome", $cliente->getNome());
        $stmt->bindValue(":telefone", $cliente->getTelefone());
        $stmt->bindValue(":email", $cliente->getEmail());
        $stmt->bindValue(":cartaoCredito", $cliente->getCartaoCredito());

        try {
            $stmt->execute();
            $id = $this->conn->lastInsertId();
            print_r($id);
            return $id;
        }catch ( PDOException $Exception){
            print_r($Exception->getMessage( ) . '' . $Exception->getCode( ));
        }

    }

    public function remove($cliente)
    {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindParam(':id', $cliente->getId());

        //executa
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function buscaTodos()
    {

        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $clientes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $cliente = new Cliente($id, $nome, $telefone, $email, $cartaoCredito);
            $clientes[] = $cliente;
        }
        return $clientes;
    }
}