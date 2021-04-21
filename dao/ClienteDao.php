<?php


class ClienteDao extends DAO
{
    private $table_name = 'w2cliente';

    public function insert($cliente) {

        $query = "INSERT INTO " . $this->table_name . " (nome, telefone, email, cartaoCredito) VALUES" . " (:nome, :telefone, :email, :cartaoCredito)";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindParam(":nome", $cliente->getNome());
        $stmt->bindParam(":telefone", $cliente->getTelefone());
        $stmt->bindParam(":email", $cliente->getEmail());
        $stmt->bindParam(":cartaoCredito", $cliente->getCartaoCredito());

        if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return -1;
        }
    }

    public function remove($cliente) {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindParam(':id', $cliente->getId());

        //executa
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function buscaTodos() {

        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $clientes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);
            $cliente = new Cliente($id, $nome, $telefone, $email, $cartaoCredito);
            $clientes[] = $cliente;
        }
        return $clientes;
    }
}