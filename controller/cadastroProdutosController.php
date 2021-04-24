<?php

include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../model/Produto.php");

$fornecedor = @$_GET["txtFornecedor"];
$produto = @$_GET["txtProduto"];
$descricao = @$_GET["txtDescricao"];
$quantidade = @$_GET["txtQuantidade"];
$valor = @$_GET["txtValor"];

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$fornecedorCompleto = $dao->getOneByNome($fornecedor);

$produto = new Produto(null, $produto, $descricao, "ww.ww.ww", $fornecedorCompleto);

$produtoDao = $pgDaoFactory->getProdutoDao();

$resposta = $produtoDao->insert($produto);

$inputProduto = "Cadastrou";
?>