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

$idF = @$_GET["idFornecedor"];
$nomeF = @$_GET["nomeFornecedor"];
$idP = @$_GET["idProduto"];
$nomeP = @$_GET["nomeProduto"];

?>

<body>
    <div class="container-fluid border">
        <form method="get" action="#">
            <div class="col-md-12">
                <div class="form-row row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="id">ID Forn.</label>
                            <input type="text" class="form-control" id="idFornecedor" name="idFornecedor" value="<?= $idF ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fornecedor">Fornecedor</label>
                            <input type="numero" class="form-control" id="nomeFornecedor" name="nomeFornecedor" value="<?= $nomeF ?>">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="idProduto" name="idProduto" value="<?= $idP ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nome">Nome produto</label>
                            <input type="numero" class="form-control" id="nomeProduto" name="nomeProduto" value="<?= $nomeP ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary cadastro-produto-botao-pesquisar" value="Pesquisar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
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

                                    if (!empty($_GET["idFornecedor"])) {
                                        if ($linhaP->getFornecedor()->getID() != $_GET["idFornecedor"]) {
                                            continue;
                                        }
                                    }
                                    if (!empty($_GET["nomeFornecedor"])) {
                                        if ($linhaP->getFornecedor()->getNome() != $_GET["nomeFornecedor"]) {
                                            continue;
                                        }
                                    }
                                    if (!empty($_GET["idProduto"])) {
                                        if ($linhaP->getID() != $_GET["idProduto"]) {
                                            continue;
                                        }
                                    }
                                    if (!empty($_GET["nomeProduto"])) {
                                        if ($linhaP->getNome() != $_GET["nomeProduto"]) {
                                            continue;
                                        }
                                    }

                                    echo '<tr>';
                                    echo '<td class="cadastro-produtos-tabela-col1">' . $linhaP->getFornecedor()->getNome() . '</td>';
                                    echo '<td class="cadastro-produtos-tabela-col2">';
                                    echo '<input type="submit" onclick="botaoEditar(
                                    \'' . $linhaP->getFornecedor()->getNome() . '\',\'' . $linhaP->getNome() . '\',\'' . $linhaP->getDescricao() . '\',\'' . $linhaP->getFoto()
                                        . '\',\'' . $linhaP->getEstoque()->getQuantidade() . '\',\'' . $linhaP->getEstoque()->getPreco() . '\'' . ',' . $linhaP->getID() . ')" name="edit" value="Editar"/>';
                                    echo '</td>';
                                    echo '<td class="cadastro-produtos-tabela-col3">' . $linhaP->getID() . '</td>';
                                    echo '<td class="cadastro-produtos-tabela-col4">' . $linhaP->getNome() . '</td>';
                                    echo '<td class="cadastro-produtos-tabela-col5">' . $linhaP->getDescricao() . '</td>';
                                    echo '<td class="cadastro-produtos-tabela-col6">' . $linhaP->getEstoque()->getQuantidade() . '</td>';
                                    echo '<td class="cadastro-produtos-tabela-col7">' . $linhaP->getEstoque()->getPreco() . '</td>';
                                    echo '<form method="post" action="../controller/EliminarProdutoController.php">';
                                    echo '<td class="cadastro-produtos-tabela-col8">';
                                    echo '<input type="submit" name="clicked[' . $linhaP->getID() . ']" value="Eliminar"/>';
                                    echo '</td>';
                                    echo '</form>';
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

    <div class="container-fluid border" id="insert">
        <form class="cadastro-fornecedor-form" action="../controller/CadastroProdutosController.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fornecedor">Fornecedor</label>
                    <select class="form-control" name="txtFornecedor" id="txtFornecedor">
                        <?php
                        foreach ($tabelaF as $linhaF) {
                            echo '<option>' . $linhaF->getNome() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="produto">Produto</label>
                    <input type="text" class="form-control" id="txtProduto" name="txtProduto">
                </div>
                <div class="form-group col-md-5">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Quantidade">Quantidade</label>
                    <input type="text" class="form-control" id="txtQuantidade" name="txtQuantidade">
                </div>
                <div class="form-group col-md-4">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" id="txtValor" name="txtValor">
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Salvar" />
        </form>
    </div>

    <div class="container-fluid border" id="update" style="display:none">
        <form class="cadastro-fornecedor-form" action="../controller/AtualizaProdutosController.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fornecedor">Fornecedor</label>
                    <select class="form-control" name="txtFornecedorUpdate" id="txtFornecedorUpdate">
                        <?php
                        foreach ($tabelaF as $linhaF) {
                            echo '<option>' . $linhaF->getNome() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="produto">Produto</label>
                    <input type="text" class="form-control" id="txtProdutoUpdate" name="txtProdutoUpdate">
                </div>
                <div class="form-group col-md-5">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="txtDescricaoUpdate" name="txtDescricaoUpdate">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Quantidade">Quantidade</label>
                    <input type="text" class="form-control" id="txtQuantidadeUpdate" name="txtQuantidadeUpdate">
                </div>
                <div class="form-group col-md-4">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" id="txtValorUpdate" name="txtValorUpdate">
                </div>
                <div class="form-group col-md-4">
                    <img class="produto-imagem" id="foto-produto">
                    <a id="btnEditarImagem" class="btn btn-primary icon-button edit-imagem-produto" title="Editar imagem do produto">
                        <i class="far fa-edit"></i>
                    </a>
                    <input type="file" id="uploadImagem" name="uploadImagem" style="display: none;" multiple/>
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
                    <input type="text" class="form-control" id="txtIdEdit" name="txtIdEdit" readonly>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../scripts/ProdutoScripts.js"></script>

</body>

</html>