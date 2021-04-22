<?php

include_once("../model/Fornecedor.php");
include_once("../dao/PgDaoFactory.php");

$fornecedor = new Fornecedor(null, "forn", "descricao", "54 0000-0000", "a@a.com");

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->insert($fornecedor);