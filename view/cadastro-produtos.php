<?php

require_once __DIR__ . '\..\controller\MainController.php';
include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Produto.php");
require_once("header.php");

?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");

$pgDaoFactory = new PgDaoFactory();
$daoF = $pgDaoFactory->getFornecedorDao();
$tabelaF = $daoF->getAll();

$daoP = $pgDaoFactory->getProdutoDao();
$tabelaP = $daoP->getAll();
?>

<body>
    <div class="container-fluid border">
        <div class="row">
            <div class="col-md-9">
                <div class="form-row row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="id">ID Forn.</label>
                            <input type="text" class="form-control" id="id-fornecedor" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fornecedor">Fornecedor</label>
                            <input type="numero" class="form-control" id="nome-fornecedor" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id-produto" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome produto</label>
                            <input type="numero" class="form-control" id="nome-produto" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <a class="btn btn-info cadastro-produto-botao-pesquisar" href="path/to/settings" aria-label="Settings">
                    <i class="fa fa-search"> Pesquisar</i>
                </a>
            </div>
            <div class="container-fluid border">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th class="cadastro-produtos-tabela-col1">Fornecedor</th>
                                <th class="cadastro-produtos-tabela-col2">Editar</th>
                                <th class="cadastro-produtos-tabela-col3">ID</th>
                                <th class="cadastro-produtos-tabela-col4">Produto</th>
                                <th class="cadastro-produtos-tabela-col5">Descrição</th>
                                <th class="cadastro-produtos-tabela-col6">Qtd.</th>
                                <th class="cadastro-produtos-tabela-col7">Preço</th>
                                <th class="cadastro-produtos-tabela-col8">Eliminar</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="cadastro-fornecedor-container scrollable">
                        <table class="table table-hover table-striped table-bordered table-condensed cadastro-fornecedor-tabela">
                            <tbody>
                                <?php
                                foreach ($tabelaP as $linhaP) {
                                    echo '<tr>';
                                    echo '<td class="cadastro-produtos-tabela-col1"><a href="#">' . $linhaP->getFornecedor()->getNome() . '</a></td>';
                                    echo '<td class="cadastro-produtos-tabela-col2">';
                                    echo '<a class="btn btn-default" href="path/to/settings" aria-label="Settings">';
                                    echo '<i class="fa fa-pencil" aria-hidden="true"></i> </a> </td>';
                                    echo '<td class="cadastro-produtos-tabela-col3">'. $linhaP->getID() .'</td>';
                                    echo '<td class="cadastro-produtos-tabela-col4">'. $linhaP->getNome() .'</td>';
                                    echo '<td class="cadastro-produtos-tabela-col5">'. $linhaP->getDescricao() .'</td>';
                                    echo '<td class="cadastro-produtos-tabela-col6"> qtd </td>';
                                    echo '<td class="cadastro-produtos-tabela-col7"> pre </td>';
                                    echo '<td class="cadastro-produtos-tabela-col8">';
                                    echo '<a class="btn btn-default" href="path/to/settings" aria-label="Settings">';
                                    echo '<i class="fa fa-trash" aria-hidden="true"></i> </a> </td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid border">
        <form class="cadastro-fornecedor-form">
            <form action="../controller/cadastroProdutosController.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="fornecedor">Fornecedor</label>
                        <select class="form-control" name="txtFornecedor">
                            <?php
                            foreach ($tabelaF as $linhaF) {
                                echo '<option>' . $linhaF->getNome() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="produto">Produto</label>
                        <input type="text" class="form-control" id="txtProduto">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="txtDescricao">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="Quantidade">Quantidade</label>
                        <input type="text" class="form-control" id="txtQuantidade">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" id="txtValor">
                    </div>
                </div>
                <a type="submit" class="btn btn-success" aria-label="Settings">
                    <i class="fa fa-save" aria-hidden="true"> Salvar</i>
                </a>
            </form>
        </form>
    </div>
</body>

</html>