<?php

include_once("../model/Cliente.php");
include_once("../dao/PgDaoFactory.php");

$cliente = new Cliente(null, "leo", "54 0000-0000", "a@a.com", "01010101010101");

$pgDaoFactory = new PgDaoFactory();

$clienteDao = $pgDaoFactory->getClienteDao();

$resposta = $clienteDao->insert($cliente);

