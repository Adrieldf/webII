<?php
    
    include_once("../dao/PgDaoFactory.php");

    $id = key($_POST['clicked']);

    $pgDaoFactory = new PgDaoFactory();

    $dao = $pgDaoFactory->getFornecedorDao();

    $dao->deleteById($id);

    header("Location: ../view/cadastro-fornecedor.php");

    exit;
?>