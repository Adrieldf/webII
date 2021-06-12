<?php

include_once("../dao/PgDaoFactory.php");

$pedido = @$_POST["pedido"];
$dataPedido = @$_POST["dataPedido"];
$dataEntrega = @$_POST["dataEntrega"];
$situacao = @$_POST["situacao"];

$pgDaoFactory = new PgDaoFactory();
$dao = $pgDaoFactory->getPedidoDao();
$dao->updateCabecalho($pedido,$dataPedido,$dataEntrega,$situacao);

header("Location: ../view/consulta-pedidos");
exit;
?>