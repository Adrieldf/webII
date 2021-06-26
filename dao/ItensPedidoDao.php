<?php

include_once('Dao.php');
include_once("../model/ItemPedido.php");

class ItensPedidoDao extends Dao
{
    private $table_name = 'w2itenspedido';

    public function getItensPedido($id_pedido)
    {
        $pgDaoFactory = new PgDaoFactory();
        //$produtos = $pgDaoFactory->getProdutoDao()->getAll();

        $query = "SELECT * FROM " . $this->table_name . " WHERE pedido_numero = :id_pedido";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id_pedido", $id_pedido);

        $stmt->execute();

        $itens = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            /*unset($produto);
            foreach($produtos as $linha){
                if($row['produto_id']== $linha->getId()){
                    $produto = $linha;
                    break;
                }
            }
            $item = new ItemPedido($id_pedido,$row['quantidade'], $row['preco'], 3);

            $itens[] = $item;*/
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
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY produto_id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $itens = [];
        /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            $pgDaoFactory = new PgDaoFactory();
            $produto = $pgDaoFactory->getProdutoDao()->getOneById($row['produto_id']);

            $item = new ItemPedido($row['pedido_numero'],$row['quantidade'],$row['preco'],$produto);

            $itens[] = $item;
        }*/
        return $itens;
    }

}