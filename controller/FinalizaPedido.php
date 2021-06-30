<?php

session_start();

include_once("../dao/PgDaoFactory.php");

$carrinho = @$_SESSION["carrinho"];
$idCliente = @$_SESSION["id_cliente"];

$pgDaoFactory = new PgDaoFactory();
$dao = $pgDaoFactory->getPedidoDao();

foreach ($carrinho as $key => $value) {
    $produto = $dao->getOneProdutoById($key);
    $item = new ItemPedido(33, $value, $produto->getEstoque()->getPreco(), $produto);
    $itens[] = $item;
}
$today = date("y-m-d");
$cliente = $dao->getOneClienteById($idCliente);
$pedido = new Pedido(0,$today,$today,"NOVO",$cliente,$itens);

$resposta = $dao->insert($pedido);

return;