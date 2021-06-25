<?php

include_once('Dao.php');
include_once("../model/Pedido.php");
include_once("../model/Cliente.php");
include_once("../dao/PgDaoFactory.php");
include_once("../dao/ClienteDao.php");
include_once("../dao/ProdutoDao.php");

class PedidoDao extends Dao
{
    private $table_name = 'w2pedido';

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY numerop ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $pgDaoFactory = new PgDaoFactory();
        $clienteDao = $pgDaoFactory->getClienteDao();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $cliente = $clienteDao->getOneById($row['id_cliente']);
            $itens = $this->getItemByPedidoId($row['numerop']);
            $pedido = new Pedido($row['id'], $row['datapedido'], $row['dataentrega'], $row['situacao'], $cliente, $itens);

            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

//    private function getItemByPedidoId($pedidoId){
//        $query = "SELECT * FROM w2itenspedido WHERE id_pedido = :id_pedido";
//
//        $stmt = $this->conn->prepare($query);
//
//        $stmt->bindValue(":id_pedido", $pedidoId);
//
//        $stmt->execute();
//
//        $pgDaoFactory = new PgDaoFactory();
//        $produtoDao = $pgDaoFactory->getProdutoDao();
//
//        $itens = [];
//        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//
//            $produto = $produtoDao->getOneById($row['id_produto']);
//            $item = new ItemPedido($row['quantidade'], $row['preco'], $produto);
//
//            $itens[] = $item;
//        }
//        return $itens;
//}

    public function updateCabecalho($id, $dataPedido, $dataEntrega, $situacao)
    {
        $query = "UPDATE " .
            $this->table_name .
            " SET 
        datapedido = :datapedido, 
        dataentrega = :dataentrega,
        situacao = :situacao" .
            " WHERE numerop = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":datapedido", $dataPedido);
        $stmt->bindValue(":dataentrega", $dataEntrega);
        $stmt->bindValue(":situacao", $situacao);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

//    public function insert($pedido)
//    {
//        $query = "INSERT INTO " .
//            $this->table_name .
//            " (datapedido, dataentrega, situacao, id_cliente) VALUES" .
//            " (:datapedido, :dataentrega, :situacao, :id_cliente)";
//
//        $stmt = $this->conn->prepare($query);
//
//        //bind
//        $stmt->bindValue(":datapedido", $pedido->getDataPedido());
//        $stmt->bindValue(":dataentrega", $pedido->getDataEntrega());
//        $stmt->bindValue(":situacao", $pedido->getSituacao());
//        $stmt->bindValue(":id_cliente", $pedido->getCliente()->getId());
//
//        $stmt->execute();
//        $id = $this->conn->lastInsertId();
//
//        foreach ($pedido->getItens as $item) {
//            $this->insertItem($item, $id);
//        }
//    }

//    private function insertItem($item, $idPedido)
//    {
//
//        $query = "INSERT INTO w2itenspedido " .
//            " (id_pedido, id_produto, quantidade, preco) VALUES" .
//            " (:id_pedido, :id_produto, :quantidade, :preco)";
//
//        $stmt = $this->conn->prepare($query);
//
//        //bind
//        $stmt->bindValue(":id_pedido", $idPedido);
//        $stmt->bindValue(":id_produto", $item->getProduto()->getId());
//        $stmt->bindValue(":quantidade", $item->getQuantidade());
//        $stmt->bindValue(":preco", $item->getPreco());
//
//        $stmt->execute();
//    }

//    public function getAllWithPagination($limit, $offset)
//    {
//        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC LIMIT :l OFFSET :o";
//
//        $stmt = $this->conn->prepare($query);
//
//        //bind
//        $stmt->bindValue(":l", $limit);
//        $stmt->bindValue(":o", $offset);
//
//        $stmt->execute();
//
//        $pgDaoFactory = new PgDaoFactory();
//        $clienteDao = $pgDaoFactory->getClienteDao();
//
//        $pedidos = [];
//        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//
//            $cliente = $clienteDao->getOneById($row['id_cliente']);
//            $pedido = new Pedido($row['id'],$row['datapedido'],$row['dataentrega'],$row['situacao'], $cliente);
//
//            $pedidos[] = $pedido;
//        }
//        return $pedidos;
//    }

    public function getAllByClienteNomeContainingWithPagination($nome, $limit, $offset)
    {
        $nomeContido = "%" . $nome . "%";
        $query =
            "SELECT * FROM w2pedido, w2cliente".
            " WHERE w2pedido.id_cliente = w2cliente.id".
            " and w2cliente.nome".
            " LIKE :nomeContido".
            " ORDER BY w2pedido.numerop ASC".
            " LIMIT :l OFFSET :o";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":nomeContido", $nomeContido);
        $stmt->bindValue(":l", $limit);
        $stmt->bindValue(":o", $offset);

        $stmt->execute();

        $pedidos = [];

        $pgDaoFactory = new PgDaoFactory();
        $itensPedidoDao = $pgDaoFactory->getItensPedidoDao();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $endereco = new Endereco($row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
            $cliente = new Cliente($row['id_cliente'], $row['nome'], $row['telefone'], $row['email1'], $row['cartaocredito'], $endereco, $row['senha']);

            $itensPedido = $itensPedidoDao->getItensPedido($row['numerop']);
            $pedido = new Pedido($row['numerop'], $row['datapedido'], $row['dataentrega'], $row['situacao'], $cliente, $itensPedido);

            $pedidos[] = $pedido;
        }
        return $pedidos;
    }
}
