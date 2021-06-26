<?php

include_once('Dao.php');
include_once("../model/ItemPedido.php");
include_once("../model/Fornecedor.php");
include_once("../model/Produto.php");

class ItensPedidoDao extends Dao
{
    private $table_name = 'w2itenspedido';

    public function getItensPedido($id_pedido)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE pedido_numero = :id_pedido";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id_pedido", $id_pedido);

        $stmt->execute();

        $itens = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            $produto = $this->getOneProdutoById($row['produto_id']);
            
            $item = new ItemPedido($id_pedido,$row['quantidade'], $row['preco'],$produto);

            $itens[] = $item;
        }
        
        return $itens;
    }

    public function getOneProdutoById($id)
    {
        $query = "SELECT * FROM w2produto WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $pgDaoFactory = new PgDaoFactory();
            $fornecedor = $this->getOneFornecedorById($row['fornecedor']);
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto'], $fornecedor, $row['quantidade'], $row['preco']);
        }

        return $produto;
    }

    public function getOneFornecedorById($id)
    {
        $query = "SELECT * FROM w2fornecedor WHERE id = :id";

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