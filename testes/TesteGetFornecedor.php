<?php

include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->getOneById(3);

echo "<p>" . $resposta->getNome() . "</p>";

echo "<p>====================</p>>";

$resposta = $dao->getAll();

foreach ($resposta as $value){

    echo "<p>" . $value->getNome() . "</p>";
}
