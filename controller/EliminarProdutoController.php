<?php
    
    include_once("../dao/PgDaoFactory.php");

    $id = key($_POST['clicked']);

    $pgDaoFactory = new PgDaoFactory();

    $dao = $pgDaoFactory->getProdutoDao();

    $dao->deleteById($id);

    header("Location: ../view/cadastro-produtos.php");

    exit;
?>