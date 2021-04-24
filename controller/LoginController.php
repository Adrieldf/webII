
<?php

include_once("../model/Cliente.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");
session_start();

$login = isset($_POST["txtEmail"]) ? addslashes(trim($_POST["txtEmail"])) : FALSE;
$senha = isset($_POST["txtSenha"]) ? md5(trim($_POST["txtSenha"])) : FALSE;

if (!$login || !$senha) {
    echo "Você deve digitar sua senha e login!<br>";
    echo "<a href='../view/login.php'>Efetuar Login</a>";
    exit;
}

$pgDaoFactory = new PgDaoFactory();
$dao = $pgDaoFactory->getClienteDao();
$cliente = $dao->getOneByEmail($login);

$problemas = FALSE;
if ($cliente) {
    if (strcmp($senha, $cliente->getSenha())) {
        $_SESSION["id_cliente"] = $cliente->getId();
        $_SESSION["nome_cliente"] = stripslashes($cliente->getNome());
        echo "<script> console.log('Login feito com sucesso! cliente: ' " .  $_SESSION['nome_cliente'] . " </script>";
        //header("Location: ../view/perfil-usuario.php");
        exit;
    } else {
        $problemas = TRUE;
    }
} else {
    $problemas = TRUE;
}

if ($problemas == TRUE) {
    echo "Problema ao fazer login, tente de novo!"; 
     echo "<script> console.log('Problema ao fazer login! cliente: ' " .  $_SESSION['nome_cliente'] . " </script>";
    header("Location: ../view/login.php");
    exit;
}
?>
