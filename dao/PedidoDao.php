<?php

include_once('Dao.php');
include_once("../model/Pedido.php");

class PedidoDao extends Dao
{
    private $table_name = 'w2pedido';

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $pedido = new Pedido($row['id'],$row['datapedido'],$row['dataentrega'],$row['situacao']);

            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

    public function updateCabecalho($id, $dataPedido, $dataEntrega, $situacao) {
        $query = "UPDATE " .
        $this->table_name .
        " SET 
        datapedido = :datapedido, 
        dataentrega = :dataentrega,
        situacao = :situacao".
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":datapedido", $dataPedido);
        $stmt->bindValue(":dataentrega", $dataEntrega);
        $stmt->bindValue(":situacao", $situacao);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

}
