<?php

include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../model/Produto.php");

$id = @$_GET["txtId"];

$nomeFornecedor = @$_GET["txtNome"];
$descricao = @$_GET["txtDescricao"];
$telefone = @$_GET["txtTelefone"];
$email = @$_GET["txtEmail"];

$cep = @$_GET["txtCep"];
$rua = @$_GET["txtRua"];
$numero = @$_GET["txtNumero"];
$complemento = @$_GET["txtComplemento"];
$bairro = @$_GET["txtBairro"];
$cidade = @$_GET["txtCidade"];
$estado = @$_POST["txtEstado"];

$endereco = new Endereco($rua,$numero,$complemento,$bairro,$cep,$cidade,$estado);
$fornecedor = new Fornecedor(null, $nomeFornecedor, $descricao, $telefone, $email, $endereco);

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();
$resposta = $dao->update($fornecedor);

header("Location: ../view/cadastro-fornecedor.php");
exit;
