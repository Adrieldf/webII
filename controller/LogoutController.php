<?php

    session_start();
    if(isset($_SESSION["nome_cliente"])) {
        session_destroy();
        header("location: ../view/consulta-produtos.php");
        exit();
    } 
?>