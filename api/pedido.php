<?php

include_once("../model/Pedido.php");
include_once("../dao/PgDaoFactory.php");

$metodo = $_SERVER["REQUEST_METHOD"];
$factory = new PgDaoFactory();

$pedidoDao = $factory->getPedidoDao();

switch ($metodo) {
    case 'GET':
//        if (!empty($_GET["id"])) {
//            getOneById($pedidoDao, intval($_GET["id"]));
//        } else {
            getAll($pedidoDao);
//        }
        break;
}
function getAll($pedidoDao)
{
    $pedidos = $pedidoDao->getAll();
    $map = [];
    foreach ($pedidos as $pedido) {
        $map[] = $pedido->getDadosParaJSON();
    }
    $json = stripslashes(json_encode($map, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo $json;
    http_response_code(200);
}
