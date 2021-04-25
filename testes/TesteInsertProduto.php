<?php


include_once("../model/Estoque.php");
include_once("../model/Produto.php");
include_once ("../model/Fornecedor.php");
include_once("../dao/PgDaoFactory.php");

$fornecedorSimulado = new Fornecedor(3, "aa", "aa", "aa", "aaa", "aaa");

$produto = new Produto(null, "nome", "desc", "ww.ww.ww", $fornecedorSimulado, 5, 5);

$pgDaoFactory = new PgDaoFactory();

$produtoDao = $pgDaoFactory->getProdutoDao();

$resposta = $produtoDao->insert($produto);