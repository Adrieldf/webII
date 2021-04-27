<?php
include_once("../model/Produto.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$fornecedor = @$_POST["txtFornecedorUpdate"];
$produto = @$_POST["txtProdutoUpdate"];
$descricao = @$_POST["txtDescricaoUpdate"];
$quantidade = @$_POST["txtQuantidadeUpdate"];
$valor = @$_POST["txtValorUpdate"];
$id = @$_POST["txtIdEdit"];

$pgDaoFactory = new PgDaoFactory();


$dao = $pgDaoFactory->getProdutoDao();
$daoF = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->getOneById($id);

$fornecedorCompleto = $daoF->getOneByNome($fornecedor);
$estoque = new Estoque($quantidade,$valor,NULL);

$resposta->setNome($produto);
$resposta->setDescricao($descricao);
$resposta->setFornecedor($fornecedorCompleto);
$resposta->setEstoque($estoque);

$a = $dao->update($resposta);

header("Location: ../view/cadastro-produtos.php");
exit;
?>