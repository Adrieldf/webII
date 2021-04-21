<?php

include_once("../model/Produto.php");
include_once("../dao/PgDaoFactory.php");

$produto = new Produto(null, "nome", "desc", "ww.ww.ww");

$pgDaoFactory = new PgDaoFactory();

$produtoDao = $pgDaoFactory->getProdutoDao();

$resposta = $produtoDao->insert($produto);