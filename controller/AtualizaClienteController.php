<?php

include_once("../model/Cliente.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");


$id = @$_GET["txtId"];
$nomeCompleto = @$_GET["txtNome"];
$email = @$_GET["txtEmail"];
$cpf = @$_GET["txtCpf"];
$senha = @$_GET["txtSenha"];
$repeatPassword = @$_GET["txtRepitaSenha"];
$telefone = @$_GET["txtTelefone"];
$cep = @$_GET["txtCep"];
$rua = @$_GET["txtRua"];
$numero = @$_GET["txtNumero"];
$complemento = @$_GET["txtComplemento"];
$bairro = @$_GET["txtBairro"];
$cidade = @$_GET["txtCidade"];
$estado = @$_GET["cboEstado"];



$endereco = new Endereco($rua, $numero, $complemento, $bairro, $cep, $cidade, $estado);

$cliente = new Cliente($id, $nomeCompleto, $telefone, $email, null, $endereco, $senha);

$pgDaoFactory = new PgDaoFactory();
$clienteDao = $pgDaoFactory->getClienteDao();
$resposta = $clienteDao->update($cliente);

header("Location: ../view/editar-usuario.php?id=" . $id);

exit;
?>