<?php

include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->getAllWithPagination(2, 2);

foreach ($resposta as $value){

    echo "<p>" . $value->getNome() . "</p>";
}

$resposta = $dao->getAllByNomeContainingWithPagination("l",2, 0);

foreach ($resposta as $value){

    echo "<p>" . $value->getNome() . "</p>";
}