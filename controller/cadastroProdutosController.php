<?php

include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Estoque.php");
include_once("../model/Produto.php");

$fornecedor = @$_POST["txtFornecedor"];
$produto = @$_POST["txtProduto"];
$descricao = @$_POST["txtDescricao"];
$quantidade = @$_POST["txtQuantidade"];
$valor = @$_POST["txtValor"];

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$fornecedorCompleto = $dao->getOneByNome($fornecedor);

$produto = new Produto(NULL, $produto,$descricao,NULL,$fornecedorCompleto->getId(),$quantidade,$valor);

$produtoDao = $pgDaoFactory->getProdutoDao();

$resposta = $produtoDao->insert($produto);

header("Location: ../view/cadastro-produtos.php");

exit;
?>