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
    <div class="container-fluid ">
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="card col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Seja bem-vinda(o)!</h5>
                    <form>
                        <div class="mb-3">
                            <label for="txtNomeCompleto" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" name="txtNomeCompleto" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="txtEmail" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="txtEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="txtCpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" name="txtCpf" placeholder="Ex: 123.456.789-12">
                        </div>
                        <div class="mb-3">
                            <label for="txtSenha" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="txtSenha">
                        </div>
                        <div class="mb-3">
                            <label for="txtRepitaSenha" class="form-label">Repita a senha</label>
                            <input type="password" class="form-control" name="txtRepitaSenha">
                        </div>
                        <div class="mb-3">
                            <label for="txtData" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control" name="txtData">
                        </div>
                        <button type="submit" class="btn btn-primary">Criar conta</button>

                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>