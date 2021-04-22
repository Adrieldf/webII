<?php

include_once("../model/Cliente.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$endereco = new Endereco("rua", "10", "comple", "bairro", "12345-678", "cidade", "estado");

$cliente = new Cliente(null, "leo", "54 0000-0000", "a@a.com", "01010101010101", $endereco);

$pgDaoFactory = new PgDaoFactory();

$clienteDao = $pgDaoFactory->getClienteDao();

$resposta = $clienteDao->insert($cliente);

