<?php

include_once("../model/Fornecedor.php");
include_once("../dao/PgDaoFactory.php");

$metodo = $_SERVER["REQUEST_METHOD"];
$factory = new PgDaoFactory();

$fornecedorDao = $factory->getFornecedorDao();

switch ($metodo) {
    case 'GET':
        if (!empty($_GET["id"])) {
            getOne($fornecedorDao, intval($_GET["id"]));
        } else {
            getAll($fornecedorDao);
        }
        break;
    case 'POST':
        create($fornecedorDao);
        break;
    case 'PUT':
        if (!empty($_GET["id"])) {
            update($fornecedorDao, intval($_GET["id"]));
        } else {
            http_response_code(404);
        }
        break;
}

function getOne($fornecedorDao, $id)
{
    $fornecedor = $fornecedorDao->getOneById($id);
    if ($fornecedor != null) {
        $json = stripslashes(json_encode($fornecedor->toJSON(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo $json;
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}

function getAll($fornecedorDao)
{
    $fornecedores = $fornecedorDao->getAll();
    $map = [];
    foreach ($fornecedores as $fornecedor) {
        $map[] = $fornecedor->toJSON();
    }
    $json = stripslashes(json_encode($map, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo $json;
    http_response_code(200);
}

function create($fornecedorDao)
{
    $map = json_decode(file_get_contents('php://input'), true);
    $eMap = $map["endereco"];

    $endereco = new Endereco($eMap["rua"], $eMap["numero"], $eMap["complemento"], $eMap["bairro"], $eMap["cep"], $eMap["cidade"], $eMap["estado"]);
    $fornecedor = new Fornecedor(null, $map["nome"],$map["descricao"], $map["telefone"], $map["email"], $endereco);
    $id = $fornecedorDao->insert($fornecedor);

    getOne($fornecedorDao, $id);
    http_response_code(201);
}

function update($fornecedorDao, $id)
{
    $fornecedor = $fornecedorDao->getOneById($id);
    if ($fornecedor != null) {
        $map = json_decode(file_get_contents('php://input'), true);
        $eMap = $map["endereco"];

        $endereco = new Endereco($eMap["rua"], $eMap["numero"], $eMap["complemento"], $eMap["bairro"], $eMap["cep"], $eMap["cidade"], $eMap["estado"]);
        $fornecedor->setNome($map["nome"]);
        $fornecedor->setDescricao($map["descricao"]);
        $fornecedor->setTelefone($map["telefone"]);
        $fornecedor->setEmail($map["email"]);
        $fornecedor->setEndereco($endereco);

        $fornecedorDao->update($fornecedor);

        getOne($fornecedorDao, $id);
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}