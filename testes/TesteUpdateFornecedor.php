<?php

include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->getOneById(3);

$resposta->setNome("aaa");

$a = $dao->update($resposta);

echo "<p>" . $a . "</p>";
