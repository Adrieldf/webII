<?php

include_once("../model/Cliente.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");


$nomeCompleto = @$_GET["txtNomeCompleto"];
$email = @$_GET["txtEmail"];
$cpf = @$_GET["txtCpf"];
$senha = @$_GET["txtSenha"];
$repeatPassword = @$_GET["txtRepitaSenha"];



//$endereco = new Endereco("rua", "10", "comple", "bairro", "12345-678", "cidade", "estado");

$cliente = new Cliente(null, $nomeCompleto, null, $email, null, null, $senha);

$pgDaoFactory = new PgDaoFactory();
$clienteDao = $pgDaoFactory->getClienteDao();
$resposta = $clienteDao->insert($cliente);

header("Location: ../view/login.php");

exit;
?>