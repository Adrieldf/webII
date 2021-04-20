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
    <div class="container-fluid border">
        <div class="row">
            <div class="col-md-9">
                <div class="form-row row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fornecedor">Fornecedor</label>
                            <select class="form-control">
                                <option selected>Selecionar fornecedor</option>
                                <option value="1">Fornecedor</option>
                                <option value="2">Fornecedor2</option>
                                <option value="3">Fornecedor3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id-produto" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-7">
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
                                <tr>
                                    <td class="cadastro-produtos-tabela-col1"><a href="#">Fornecedor</a></td>
                                    <td class="cadastro-produtos-tabela-col2">
                                        <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="cadastro-produtos-tabela-col3">1</td>
                                    <td class="cadastro-produtos-tabela-col4">Fruteira</td>
                                    <td class="cadastro-produtos-tabela-col5">Vende frutas</td>
                                    <td class="cadastro-produtos-tabela-col6">100</td>
                                    <td class="cadastro-produtos-tabela-col7">20,00</td>
                                    <td class="cadastro-produtos-tabela-col8">
                                        <div class="container">
                                            <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid border">
        <form class="cadastro-fornecedor-form">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fornecedor">Fornecedor</label>
                    <select class="form-control">
                        <option value="1">Fornecedor</option>
                        <option value="2">Fornecedor2</option>
                        <option value="3">Fornecedor3</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="produto">Produto</label>
                    <input type="text" class="form-control" id="produto">
                </div>
                <div class="form-group col-md-5">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Quantidade">Quantidade</label>
                    <input type="text" class="form-control" id="quantidade">
                </div>
                <div class="form-group col-md-4">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" id="valor">
                </div>
            </div>
            <a class="btn btn-success" href="path/to/settings" aria-label="Settings">
                <i class="fa fa-save" aria-hidden="true"> Salvar</i>
            </a>
        </form>
    </div>
</body>

</html>