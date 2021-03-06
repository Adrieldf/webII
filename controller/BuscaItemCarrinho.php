<?php

session_start();

include_once("../dao/PgDaoFactory.php");

$id = @$_POST['id'];
$carrinho = @$_SESSION["carrinho"];

$pgDaoFactory = new PgDaoFactory();
$dao = $pgDaoFactory->getPedidoDao();

if (array_key_exists($id, $carrinho)) {
    $carrinho[$id] = $carrinho[$id] + 1;
} else {
    $carrinho[$id] = 1;
}

foreach ($carrinho as $key => $value) {
    $produto = $dao->getOneProdutoById($key);
    $item = new ItemPedido(33, $value, $produto->getEstoque()->getPreco(), $produto);
    $itens[] = $item;
}

@$_SESSION["carrinho"] = $carrinho;
echo $dao->setItensJSON($itens);
