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

    public function getAllWithPagination($limit, $offset)
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC LIMIT :l OFFSET :o";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindValue(":l", $limit);
        $stmt->bindValue(":o", $offset);

        $stmt->execute();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $pedido = new Pedido($row['id'],$row['datapedido'],$row['dataentrega'],$row['situacao']);

            $pedidos[] = $pedido;
        }
        return $pedidos;
        return $clientes;
    }

//    public function getAllByClienteNomeContainingWithPagination($nome, $limit, $offset)
//    {
//        $nomeContido = "%".$nome."%";
//        $query = "SELECT * FROM " . $this->table_name . " WHERE nome LIKE :nomeContido ORDER BY id ASC LIMIT :l OFFSET :o";
//
//        $stmt = $this->conn->prepare($query);
//
//        $stmt->bindValue(":nomeContido", $nomeContido);
//        $stmt->bindValue(":l", $limit);
//        $stmt->bindValue(":o", $offset);
//
//        $stmt->execute();
//
//        $clientes = [];
//        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//
//            $endereco = new Endereco($row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
//            $cliente = new Cliente($row['id'], $row['nome'], $row['telefone'], $row['email1'], $row['cartaocredito'], $endereco, $row['senha']);
//
//            $clientes[] = $cliente;
//        }
//        return $clientes;
//    }
}
