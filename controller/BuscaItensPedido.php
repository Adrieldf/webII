<?php

include_once("../dao/PgDaoFactory.php");

$nr_pedido = @$_POST['nr_pedido'];

$pgDaoFactory = new PgDaoFactory();

$itemDao = $pgDaoFactory->getItensPedidoDao();

echo $dao = $itemDao->getItensPedidoJSON($nr_pedido);

?>