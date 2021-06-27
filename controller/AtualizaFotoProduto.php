<?php

include_once("../model/Produto.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");

$id = @$_POST["txtIdEdit"];
$foto = @$_POST["foto"];

$pgDaoFactory = new PgDaoFactory();
$dao = $pgDaoFactory->getProdutoDao();

$resposta = $dao->getOneById($id);

$resposta->setFoto($foto);

$a = $dao->update($resposta);

//header("Location: ../view/cadastro-produtos.php");
exit;

exit;
?>