<?php

include_once("../model/Produto.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getProdutoDao();

$resposta = $dao->getOneById(5);

$resposta->setNome("aaa");

$a = $dao->update($resposta);

echo "<p>" . $a . "</p>";