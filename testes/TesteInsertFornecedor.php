<?php

include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$endereco = new Endereco("rua", "999", "co", "ba", '98765-432', "c", "es");

$fornecedor = new Fornecedor(null, "forn", "descricao", "54 0000-0000", "a@a.com", $endereco);

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->insert($fornecedor);