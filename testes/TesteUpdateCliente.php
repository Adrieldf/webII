<?php

include_once("../model/Cliente.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getClienteDao();

$resposta = $dao->getOneById(6);

$resposta->setNome("aaa");

$a = $dao->update($resposta);

echo "<p>" . $a . "</p>";