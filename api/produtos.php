<?php

include_once("../model/Produto.php");
include_once("../model/Fornecedor.php");
include_once("../dao/PgDaoFactory.php");

$metodo = $_SERVER["REQUEST_METHOD"];
$factory = new PgDaoFactory();

$produtoDao = $factory->getProdutoDao();
$fornecedorDao = $factory->getFornecedorDao();

switch ($metodo) {
    case 'GET':
        if (!empty($_GET["id"])) {
            getOne($produtoDao);
        } else {
            getAll($produtoDao);
        }
        break;
    case 'POST':
        create($produtoDao);
        break;
    case 'PUT':
        if (!empty($_GET["id"])) {
            update($produtoDao);
        } else {
            http_response_code(404);
        }
        break;
}

function getOne($produtoDao)
{
    $id = intval($_GET["id"]);
    $produto = $produtoDao->getOneById($id);
    if ($produto != null) {
        $json = stripslashes(json_encode($produto->toJSON(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo $json;
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}

function getAll($produtoDao)
{
    $produtos = $produtoDao->getAll();
    $map = [];
    foreach ($produtos as $produto) {
        $map[] = $produto->toJSON();
    }
    $json = stripslashes(json_encode($map, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo $json;
    http_response_code(200);
}

function create($produtoDao)
{
    $map = json_decode(file_get_contents('php://input'), true);
    $produto = new Produto(null, $map["nome"], $map["descricao"], null, $map["fornecedor"], 0, $map["preco"]);
    $produtoDao->insert($produto);
    http_response_code(201);
}

function update($produtoDao)
{
    $id = intval($_GET["id"]);
    $produto = $produtoDao->getOneById($id);
    if ($produto != null) {
        $map = json_decode(file_get_contents('php://input'), true);
        $produto->setNome($map["nome"]);
        $produto->setDescricao($map["descricao"]);
        $produto->setFornecedor($map["fornecedor"]);
        $produto->getEstoque()->setPreco($map["preco"]);

        $produtoDao->update($produto);

        http_response_code(200);
    } else {
        http_response_code(404);
    }
}
