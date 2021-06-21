<?php

include_once("../model/Cliente.php");
include_once("../dao/PgDaoFactory.php");

$metodo = $_SERVER["REQUEST_METHOD"];
$factory = new PgDaoFactory();

$clienteDao = $factory->getClienteDao();

switch ($metodo) {
    case 'GET':
        if (!empty($_GET["id"])) {
            getOne($clienteDao, intval($_GET["id"]));
        } else {
            getAll($clienteDao);
        }
        break;
    case 'POST':
        create($clienteDao);
        break;
    case 'PUT':
        if (!empty($_GET["id"])) {
            update($clienteDao, intval($_GET["id"]));
        } else {
            http_response_code(404);
        }
        break;
}

function getOne($clienteDao, $id)
{
    $cliente = $clienteDao->getOneById($id);
    if ($cliente != null) {
        $json = stripslashes(json_encode($cliente->toJSON(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo $json;
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}

function getAll($clienteDao)
{
    $clientes = $clienteDao->getAll();
    $map = [];
    foreach ($clientes as $cliente) {
        $map[] = $cliente->toJSON();
    }
    $json = stripslashes(json_encode($map, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo $json;
    http_response_code(200);
}

function create($clienteDao)
{
    $map = json_decode(file_get_contents('php://input'), true);
    $eMap = $map["endereco"];

    $endereco = new Endereco($eMap["rua"], $eMap["numero"], $eMap["complemento"], $eMap["bairro"], $eMap["cep"], $eMap["cidade"], $eMap["estado"]);
    $cliente = new Cliente(null, $map["nome"], $map["telefone"], $map["email"], $map["cartaoCredito"], $endereco, $map["senha"]);
    $id = $clienteDao->insert($cliente);

    getOne($clienteDao, $id);
    http_response_code(201);
}

function update($clienteDao, $id)
{
    $cliente = $clienteDao->getOneById($id);
    if ($cliente != null) {
        $map = json_decode(file_get_contents('php://input'), true);
        $eMap = $map["endereco"];

        $endereco = new Endereco($eMap["rua"], $eMap["numero"], $eMap["complemento"], $eMap["bairro"], $eMap["cep"], $eMap["cidade"], $eMap["estado"]);
        $cliente->setNome($map["nome"]);
        $cliente->setTelefone($map["telefone"]);
        $cliente->setEmail($map["email"]);
        $cliente->setEndereco($endereco);

        $clienteDao->update($cliente);

        getOne($clienteDao, $id);
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}