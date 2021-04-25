<?php

include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../model/Produto.php");

$nomeFornecedor = @$_POST["txtNome"];
$descricao = @$_POST["txtDescricao"];
$telefone = @$_POST["txtTelefone"];
$email = @$_POST["txtEmail"];

$cep = @$_POST["txtCep"];
$rua = @$_POST["txtRua"];
$numero = @$_POST["txtNumero"];
$complemento = @$_POST["txtComplemento"];
$bairro = @$_POST["txtBairro"];
$cidade = @$_POST["txtCidade"];
$estado = @$_POST["txtEstado"];

$pgDaoFactory = new PgDaoFactory();

$endereco = new Endereco($rua,$numero,$complemento,$bairro,$cep,$cidade,$estado);

$fornecedor = new Fornecedor(null, $nomeFornecedor, $descricao, $telefone, $email, $endereco);

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->insert($fornecedor);
echo "PASSEI AQUI";
print_r("PASSEI AQUI");

exit;

?>