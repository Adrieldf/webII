<?php

require_once __DIR__ . '\..\controller\MainController.php';
include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
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

$teste = function ($tabela) {
    foreach ($tabela as $linha) {
        echo '<tr>';
        echo '<td class="cadastro-fornecedor-tabela-col1">';
        echo '<a class="btn btn-default" href="path/to/settings" aria-label="Settings">';
        echo '<i class="fa fa-pencil" aria-hidden="true"></i> </a> </td>';
        echo '<td class="cadastro-fornecedor-tabela-col2">' . $linha->getID() . '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col3">' . $linha->getNome() . '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col4">' . $linha->getDescricao() . '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col5">' . $linha->getTelefone() . '</td>';
        echo '<td class="cadastro-fornecedor-tabela-col6">' . $linha->getEmail() . '</td>';
        echo '<form method="post" action="../controller/EliminarFornecedorController.php">';
        echo '<td class="cadastro-fornecedor-tabela-col7">';
        echo '<input type="submit" name="clicked[' . $linha->getID() . ']" value="Eliminar"';
        echo '</td>';
        echo '</form>';
        echo '</tr>';
    }
};
?>

<body>
    <div class="container-fluid border">
        <div class="row">
            <div class="col-md-6">
                <div class="form-row row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="endereco">ID</label>
                            <input type="text" class="form-control" id="id-fornecedor" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="numero">Nome</label>
                            <input type="numero" class="form-control" id="nome-fornecedor" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <a class="btn btn-info cadastro-fornecedor-botao-pesquisar" href="path/to/settings" aria-label="Settings">
                    <i class="fa fa-search"> Pesquisar</i>
                </a>
            </div>
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
                        <table class="table table-hover table-striped table-bordered table-condensed cadastro-fornecedor-tabela">
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
    <div class="container-fluid border">
        <form class="cadastro-fornecedor-form" method="get" action="../controller/CadastroFornecedorController.php">
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
                    <label for="estado" >Estado</label>
                    <select id="txtEstado" name="txtEstado" class="form-control">
                        <option selected>RS</option>
                        <option>SC</option>
                        <option>PR</option>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Salvar" />
            <!--
                    <a type="submit" class="btn btn-success">
                        <i class="fa fa-save" aria-hidden="true"> Salvar</i>
                    </a>-->
            <!--
            <a class="btn btn-light" href="path/to/settings" aria-label="Settings">
                <i class="fa fa-eraser"> Limpar</i>
            </a>-->
        </form>
    </div>

    <script type="text/javascript">
        function EliminaFornecedor(btnClick) {
            var table = document.getElementById('tableF');

            //alert(btnClick);
        }
    </script>

    <script type="text/javascript">
        function SalvarFornecedor(btnClick) {
            var table = document.getElementById('tableF');

            //alert(btnClick);
        }
    </script>

</body>

</html>