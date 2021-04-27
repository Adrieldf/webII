<?php

require_once __DIR__ . '\..\controller\MainController.php';
include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
require_once("header.php");

?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");

$pgDaoFactory = new PgDaoFactory();
$dao = $pgDaoFactory->getFornecedorDao();
$tabela = $dao->getAll();

$id = @$_GET["Id"];
$fornecedor = @$_GET["Fornecedor"];

$teste = function ($tabela) {
    foreach ($tabela as $linha) {
        if (!empty($_GET["Id"])) {
            if ($linha->getID() != $_GET["Id"]) {
                continue;
            }
        }
        if (!empty($_GET["Fornecedor"])) {
            if ($linha->getNome() != $_GET["Fornecedor"]) {
                continue;
            }
        }

        echo '<tr>';
        echo '<td class="cadastro-fornecedor-tabela-col1">';
        echo '<input type="submit" onclick="botaoEditar(
            \'' . $linha->getNome() . '\',\'' . $linha->getDescricao() . '\',\'' . $linha->getTelefone()
            . '\',\'' . $linha->getEmail() . '\',\'' . $linha->getEndereco()->getCep() . '\',\'' . $linha->getEndereco()->getRua()
            . '\',\'' . $linha->getEndereco()->getNumero() . '\',\'' . $linha->getEndereco()->getComplemento()
            . '\',\'' . $linha->getEndereco()->getBairro() . '\',\'' . $linha->getEndereco()->getCidade() . '\',\'' . $linha->getEndereco()->getEstado()
            . '\' '. ','.$linha->getID().' )" name="edit[' . $linha->getID() . ']" value="Editar"/>';
        echo '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col2">' . $linha->getID() . '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col3">' . $linha->getNome() . '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col4">' . $linha->getDescricao() . '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col5">' . $linha->getTelefone() . '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col6">' . $linha->getEmail() . '</td>';
        echo '<form method="post" action="../controller/EliminarFornecedorController.php">';
        echo '<td class="cadastro-fornecedor-tabela-col7">';
        echo '<input type="submit" name="clicked[' . $linha->getID() . ']" value="Eliminar"/>';
        echo '</td>';
        echo '</form>';
        echo '</tr>';
    }
}; //cadastro-fornecedor-botao-pesquisar
?>

<body>
    <div class="container-fluid border">
        <form method="get" action="#">
            <div class="col-md-12">
                <div class="form-row row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="endereco">ID</label>
                            <input type="text" class="form-control" id="Id" name="Id" value="<?= $id ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="numero">Nome</label>
                            <input type="numero" class="form-control" id="Fornecedor" name="Fornecedor" value="<?= $fornecedor ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary cadastro-fornecedor-botao-pesquisar" value="Pesquisar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="container-fluid border">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed" id="tableF">
                        <thead>
                            <tr>
                                <th class="cadastro-fornecedor-tabela-col1">Editar</th>
                                <th class="cadastro-fornecedor-tabela-col2">ID</th>
                                <th class="cadastro-fornecedor-tabela-col3">Nome</th>
                                <th class="cadastro-fornecedor-tabela-col4">Descrição</th>
                                <th class="cadastro-fornecedor-tabela-col5">Telefone</th>
                                <th class="cadastro-fornecedor-tabela-col6">Email</th>
                                <th class="cadastro-fornecedor-tabela-col7">Eliminar</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="cadastro-fornecedor-container scrollable">
                        <table id="tableF" class="table table-hover table-striped table-bordered table-condensed cadastro-fornecedor-tabela">
                            <tbody>
                                <?php
                                echo $teste($tabela);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid border" id="insert">
        <form class="cadastro-fornecedor-form" method="POST" action="../controller/CadastroFornecedorController.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome fornecedor</label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome">
                </div>
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="(##) #####-####">
                </div>
                <div class="form-group col-md-4">
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
            <div class="form-row">
                <input type="submit" class="btn btn-success" value="Salvar" />
            </div>
        </form>
    </div>
    <div class="container-fluid border" id="update" style="display:none">
        <form class="cadastro-fornecedor-form" method="POST" action="../controller/AtualizaFornecedorController.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome fornecedor</label>
                    <input type="text" class="form-control" id="txtNomeUpdate" name="txtNomeUpdate">
                </div>
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="txtDescricaoUpdate" name="txtDescricaoUpdate">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="txtTelefoneUpdate" name="txtTelefoneUpdate" placeholder="(##) #####-####">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="text" type="email" class="form-control" id="txtEmailUpdate" name="txtEmailUpdate" placeholder="exemplo@exemplo.com">
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" type="email" class="form-control" id="txtCepUpdate" name="txtCepUpdate" placeholder="#####-###">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" id="txtRuaUpdate" name="txtRuaUpdate">
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Número</label>
                    <input type="text" type="email" class="form-control" id="txtNumeroUpdate" name="txtNumeroUpdate">
                </div>
                <div class="form-group col-md-2">
                    <label for="complemento">Complemento</label>
                    <input type="text" type="email" class="form-control" id="txtComplementoUpdate" name="txtComplementoUpdate">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="txtBairroUpdate" name="txtBairroUpdate">
                </div>
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" type="email" class="form-control" id="txtCidadeUpdate" name="txtCidadeUpdate">
                </div>
                <div class="form-group col-md-2">
                    <label for="estado">Estado</label>
                    <select id="txtEstadoUpdate" name="txtEstadoUpdate" class="form-control">
                        <option selected>RS</option>
                        <option>SC</option>
                        <option>PR</option>
                    </select>
                </div>
            </div>
            <div class="form-inline">
                <div class="form-group col-md-1">
                    <input type="submit" class="btn btn-success" value="Salvar" />
                </div>
                <div class="form-group col-md-1">
                    <input type="button" class="btn btn-danger" value="Cancelar" onclick="escodeBotaoCancelar()" />
                </div>
                <div class="form-group col-md-4">
                <label for="idEdit">ID selecionado: </label>
                <input type="text" class="form-control" id="txtIdEdit" name="txtIdEdit" readonly></div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../scripts/FornecedorScripts.js"></script>



</body>

</html>