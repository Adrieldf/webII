<?php
require_once("header.php");
session_start();
$nomeCliente = @$_SESSION["nome_cliente"];
$idCliente = @$_SESSION["id_cliente"];
$_admin = @$_SESSION["admin"];
?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
    <div class="container-fluid">
      <a class="navbar-brand navbar-title" href="consulta-produtos.php" style="color:white">Loja Azul</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
       
        </ul>
        <?php if ($nomeCliente != "") : ?>
          <div class="d-flex">
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='editar-usuario.php?id=<?= $idCliente ?>';"> <?= $nomeCliente ?> </button>
            &nbsp;
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='consulta-pedidos.php';"> Pedidos</button>
            <?php if ($_admin != "" && $_admin) : ?>
              &nbsp;
              <button class="btn btn-outline-success navbar-button" onclick="window.location.href='cadastro-fornecedor.php';">Fornecedores</button>
              &nbsp;
              <button class="btn btn-outline-success navbar-button" onclick="window.location.href='cadastro-produtos.php';">Produtos</button>

            <?php endif; ?>
            &nbsp;
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='../controller/LogoutController.php';">Sair</button>
          </div>
        <?php else : ?>
          <div class="d-flex">
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='cadastro-usuario.php';">Cadastrar-se</button>
            &nbsp;
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='login.php';">Login</button>
          </div>
        <?php endif; ?>

      </div>
    </div>
</header>