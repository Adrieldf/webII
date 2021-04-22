<?php

include_once("../model/Cliente.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getClienteDao();

$resposta = $dao->getOneById(6);

echo "<p>" . $resposta->getNome() . "</p>";

echo "<p>====================</p>";

$resposta = $dao->getAll();

foreach ($resposta as $value){

    echo "<p>" . $value->getNome() . "</p>";
}