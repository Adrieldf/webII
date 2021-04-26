<?php

require_once __DIR__ . '\..\controller\MainController.php';
include_once("../dao/PgDaoFactory.php");
include_once("../model/Cliente.php");
require_once("header.php");

?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");

?>

<body>
    <div class="container-fluid border">
        <form class="cadastro-fornecedor-form" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome">
                </div>
                <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="(##) #####-####">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="email">Email</label>
                    <input type="text" type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="exemplo@exemplo.com">
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" type="email" class="form-control" id="txtCep" name="txtCep" placeholder="#####-###">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" id="txtRua" name="txtRua">
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Número</label>
                    <input type="text" type="email" class="form-control" id="txtNumero" name="txtNumero">
                </div>
                <div class="form-group col-md-2">
                    <label for="complemento">Complemento</label>
                    <input type="text" type="email" class="form-control" id="txtComplemento" name="txtComplemento">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="txtBairro" name="txtBairro">
                </div>
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" type="email" class="form-control" id="txtCidade" name="txtCidade">
                </div>
                <div class="form-group col-md-2">
                    <label for="estado">Estado</label>
                    <select id="txtEstado" name="txtEstado" class="form-control">
                        <option selected>RS</option>
                        <option>SC</option>
                        <option>PR</option>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Salvar" />
        </form>
    </div>


</body>

</html>