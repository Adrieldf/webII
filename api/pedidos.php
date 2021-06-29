<?php

include_once("../model/Pedido.php");
include_once("../dao/PgDaoFactory.php");

$metodo = $_SERVER["REQUEST_METHOD"];
$factory = new PgDaoFactory();

$pedidoDao = $factory->getPedidoDao();

switch ($metodo) {
    case 'GET':
        if (!empty($_GET["id"])) {
            getById($pedidoDao, intval($_GET["id"]));
        } else {
            if (!empty($_GET["nome"])) {
                getByClienteNome($pedidoDao, intval($_GET["nome"]));
            } else {
                getAll($pedidoDao);
            }
        }
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

function getById($pedidoDao, $id)
{
    $pedidos = $pedidoDao->getAll();
    $p = null;
    foreach ($pedidos as $pedido) {
        if ($pedido->getNumero() == $id) {
            $p = $pedido;
        }
    }
    if ($p == null) {
        http_response_code(404);
    } else {
        $json = stripslashes(json_encode($p->getDadosParaJSON(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo $json;
        http_response_code(200);
    }

}

function getByClienteNome($pedidoDao, $nome)
{
    $pedidos = $pedidoDao->getAll();
    $map = [];
    foreach ($pedidos as $pedido) {
        if ($pedido->getCliente()->getNome() == $nome) {
            $map[] = $pedido->getDadosParaJSON();
        }
    }

    $json = stripslashes(json_encode($map, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo $json;
    http_response_code(200);


}
