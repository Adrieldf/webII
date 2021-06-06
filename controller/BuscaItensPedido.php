<?php

include_once("../dao/PgDaoFactory.php");

$nr_pedido = @$_POST['nr_pedido'];

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getItensPedidoDao();

echo $dao->getItensPedidoJSON($nr_pedido);
