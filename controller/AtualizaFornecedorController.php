<?php
include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../model/Produto.php");

$nomeFornecedor = @$_POST["txtNomeUpdate"];
$descricao = @$_POST["txtDescricaoUpdate"];
$telefone = @$_POST["txtTelefoneUpdate"];
$email = @$_POST["txtEmailUpdate"];

$cep = @$_POST["txtCepUpdate"];
$rua = @$_POST["txtRuaUpdate"];
$numero = @$_POST["txtNumeroUpdate"];
$complemento = @$_POST["txtComplementoUpdate"];
$bairro = @$_POST["txtBairroUpdate"];
$cidade = @$_POST["txtCidadeUpdate"];
$estado = @$_POST["txtEstadoUpdate"];

$id = @$_POST["txtIdEdit"];

$pgDaoFactory = new PgDaoFactory();

$endereco = new Endereco($rua,$numero,$complemento,$bairro,$cep,$cidade,$estado);

$dao = $pgDaoFactory->getFornecedorDao();

$resposta = $dao->getOneById($id);

$resposta->setNome($nomeFornecedor);
$resposta->setDescricao($descricao);
$resposta->setTelefone($telefone);
$resposta->setEmail($email);

$resposta->setEndereco($endereco);

$a = $dao->update($resposta);


header("Location: ../view/cadastro-fornecedor.php");
exit;
?>