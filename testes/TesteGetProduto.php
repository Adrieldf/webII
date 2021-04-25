<?php

include_once("../model/Estoque.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../model/Produto.php");
include_once("../dao/PgDaoFactory.php");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getProdutoDao();

$resposta = $dao->getOneById(5);

echo "<p>" . $resposta->getNome() . "</p>";
echo "<p>" . $resposta->getFornecedor()->getNome() . "</p>";
echo "<p>" . $resposta->getEstoque()->getProduto()->getNome() . "</p>";

echo "<p>====================</p>";

$resposta = $dao->getAll();

foreach ($resposta as $value) {

    echo "<p>" . $value->getNome() . "</p>";
}
