<?php

include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../model/Produto.php");

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

$pgDaoFactory = new PgDaoFactory();

$endereco = new Endereco($rua,$numero,$complemento,$bairro,$cep,$cidade,$estado);

$fornecedor = new Fornecedor(null, $nomeFornecedor, $descricao, $telefone, $email, $endereco);

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->insert($fornecedor);


exit;

?>