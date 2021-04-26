<?php

require_once __DIR__ . '\..\controller\MainController.php';
require_once("header.php");

?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");
?>

<body>

<div class="container container-md">
    <button class="btn btn-primary col-md-12" style="margin-top: 10px" onclick="window.location.href='cadastro-fornecedor.php';">
        Manutenção de Fornecedores
    </button>
    <button class="btn btn-primary col-md-12" style="margin-top: 10px" onclick="window.location.href='cadastro-produtos.php';">
        Manutenção de Produtos
    </button>
</div>


</body>
</html>