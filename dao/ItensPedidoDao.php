<?php

include_once('Dao.php');
include_once("../model/ItemPedido.php");

class ItensPedidoDao extends Dao
{
    private $table_name = 'w2itenspedido';

    public function getItensPedido($id_pedido)
    {
        $query = "SELECT * FROM " . $this->table_name . "WHERE id_pedido = :id_pedido";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id_pedido", $id_pedido);
        $stmt->execute();

        $itens = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $pgDaoFactory = new PgDaoFactory();
            $produto = $pgDaoFactory->getProdutoDao()->getOneById($row['id_produto']);

            $item = new ItemPedido($row['quantidade'],$row['preco'],$produto);

            $itens[] = $item;
        }
        if($id_pedido==3){
            $item = new ItemPedido(1,2,3);
            $itens[] = $item;
        }
        else{
            $item = new ItemPedido(4,4,4);
            $itens[] = $item;
        }
        
        return $itens;
    }

    public function getItensPedidoJSON($id_pedido){
        $itens = $this->getItensPedido($id_pedido);
        $itensJSON = array();
        foreach ($itens as $item) {
            $itensJSON[] = $item->getDadosParaJSON();
        }
        return stripslashes(json_encode($itensJSON,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

       

        $itens = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            $pgDaoFactory = new PgDaoFactory();
            $produto = $pgDaoFactory->getProdutoDao()->getOneById($row['id_produto']);

            $item = new ItemPedido($row['quantidade'],$row['preco'],$produto);

            $itens[] = $item;
        }
        return $itens;
    }

}