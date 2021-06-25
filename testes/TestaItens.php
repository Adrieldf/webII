<?php

include_once("../model/ItemPedido.php");
include_once("../model/Pedido.php");
include_once("../dao/PgDaoFactory.php");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getPedidoDao();

$resposta = $dao->getAllByClienteNomeContainingWithPagination("", 2, 0);

foreach ($resposta as $value){

    echo "<p>" . $value->getNumero() . "</p>";
}