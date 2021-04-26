<?php
require_once("header.php");
session_start();
$nomeCliente = @$_SESSION["nome_cliente"];
$idCliente = @$_SESSION["id_cliente"];
?>

<header>
<nav class="navbar navbar-expand-lg navbar-light navbar-bg">
  <div class="container-fluid">
    <a class="navbar-brand navbar-title" href="index.php">Loja</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
       <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
    
       <!-- Usar o dropdown aqui para quando o usuario estiver logado depois --> 
   <!--    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
     --> 
      </ul>
      <?php if ($nomeCliente != "") : ?>
          <div class="d-flex">
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='editar-usuario.php'"> <?=$nomeCliente?> </button>
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