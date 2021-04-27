<?php

include_once("../model/Cliente.php");
include_once("../model/Endereco.php");
include_once("../dao/PgDaoFactory.php");
require_once __DIR__ . '\..\controller\MainController.php';
require_once("header.php");

?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");

?>
<?php
$idCliente = @$_GET["id"];
$id = "";
$nome = "";
$email = "";
$senha = "";
$telefone = "";
$cep = "";
$rua = "";
$numero = "";
$complemento = "";
$bairro = "";
$cidade = "";
$estado = "";

if (!is_null($idCliente)) {

    $pgDaoFactory = new PgDaoFactory();
    $dao = $pgDaoFactory->getClienteDao();
    $cliente = $dao->getOneById($idCliente);
    if (is_null($cliente)) {
        echo "<script type='javascript'>alert('Erro ao carregar dados do cliente!');";
        header("Location: ../view/index.php");
        exit;
    }

    $id = $cliente->getId();
    $nome = $cliente->getNome();
    $email = $cliente->getEmail();
    $senha = $cliente->getSenha();
    $telefone = $cliente->getTelefone();
    $cep = $cliente->getEndereco()->getCep();
    $rua = $cliente->getEndereco()->getRua();
    $numero = $cliente->getEndereco()->getNumero();
    $complemento = $cliente->getEndereco()->getComplemento();
    $bairro = $cliente->getEndereco()->getBairro();
    $cidade = $cliente->getEndereco()->getCidade();
    $estado = $cliente->getEndereco()->getEstado();
}
?>

<body>
    <div class="container-fluid border">
        <form action="../controller/AtualizaClienteController.php" method="get" class="cadastro-fornecedor-form">
            <input type="hidden" id="txtId" name="txtId" value="<?= $id ?>">
            <input type="hidden" id="txtSenha" name="txtSenha" value="<?= $senha ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?= $nome ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" value="<?= $telefone ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="email">Email</label>
                    <input type="text" type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="exemplo@exemplo.com" value="<?= $email ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" type="email" class="form-control" id="txtCep" name="txtCep" value="<?= $cep ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" id="txtRua" name="txtRua" value="<?= $rua ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Número</label>
                    <input type="text" type="email" class="form-control" id="txtNumero" name="txtNumero" value="<?= $numero ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="complemento">Complemento</label>
                    <input type="text" type="email" class="form-control" id="txtComplemento" name="txtComplemento" value="<?= $complemento ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="txtBairro" name="txtBairro" value="<?= $bairro ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" type="email" class="form-control" id="txtCidade" name="txtCidade" value="<?= $cidade ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="estado">Estado</label>

                    <select class="form-control" name="cboEstado" id="cboEstado" selected="<?= $estado ?>">
                        <option value=""></option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AM">AM</option>
                        <option value="AP">AP</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MG">MG</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PE">PE</option>
                        <option value="PR">PR</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="RS">RS</option>
                        <option value="SC">SC</option>
                        <option value="SE">SE</option>
                        <option value="SP">SP</option>
                        <option value="TO">TO</option>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Salvar" />
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#txtCep').mask('00000-000');
            $('#txtTelefone').mask('(00) 00000-0000');
        });
    </script>

</body>

</html>