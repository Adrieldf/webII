<?php


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="../styles/main.css" rel="stylesheet">

</head>

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
                    <table class="table table-striped table-hover table-condensed">
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
                                <tr>
                                    <td class="cadastro-fornecedor-tabela-col1">
                                        <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="cadastro-fornecedor-tabela-col2">1</td>
                                    <td class="cadastro-fornecedor-tabela-col3">Fruteira</td>
                                    <td class="cadastro-fornecedor-tabela-col4">Vende frutas</td>
                                    <td class="cadastro-fornecedor-tabela-col5">12345678</td>
                                    <td class="cadastro-fornecedor-tabela-col6">fruteira@gmail.com</td>
                                    <td class="cadastro-fornecedor-tabela-col7">
                                        <div class="container">
                                            <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cadastro-fornecedor-tabela-col1">
                                        <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="cadastro-fornecedor-tabela-col2">1</td>
                                    <td class="cadastro-fornecedor-tabela-col3">Fruteira</td>
                                    <td class="cadastro-fornecedor-tabela-col4">Vende frutas</td>
                                    <td class="cadastro-fornecedor-tabela-col5">12345678</td>
                                    <td class="cadastro-fornecedor-tabela-col6">fruteira@gmail.com</td>
                                    <td class="cadastro-fornecedor-tabela-col7">
                                        <div class="container">
                                            <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cadastro-fornecedor-tabela-col1">
                                        <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="cadastro-fornecedor-tabela-col2">1</td>
                                    <td class="cadastro-fornecedor-tabela-col3">Fruteira</td>
                                    <td class="cadastro-fornecedor-tabela-col4">Vende frutas</td>
                                    <td class="cadastro-fornecedor-tabela-col5">12345678</td>
                                    <td class="cadastro-fornecedor-tabela-col6">fruteira@gmail.com</td>
                                    <td class="cadastro-fornecedor-tabela-col7">
                                        <div class="container">
                                            <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cadastro-fornecedor-tabela-col1">
                                        <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="cadastro-fornecedor-tabela-col2">1</td>
                                    <td class="cadastro-fornecedor-tabela-col3">Fruteira</td>
                                    <td class="cadastro-fornecedor-tabela-col4">Vende frutas</td>
                                    <td class="cadastro-fornecedor-tabela-col5">12345678</td>
                                    <td class="cadastro-fornecedor-tabela-col6">fruteira@gmail.com</td>
                                    <td class="cadastro-fornecedor-tabela-col7">
                                        <div class="container">
                                            <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cadastro-fornecedor-tabela-col1">
                                        <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="cadastro-fornecedor-tabela-col2">1</td>
                                    <td class="cadastro-fornecedor-tabela-col3">Fruteira</td>
                                    <td class="cadastro-fornecedor-tabela-col4">Vende frutas</td>
                                    <td class="cadastro-fornecedor-tabela-col5">12345678</td>
                                    <td class="cadastro-fornecedor-tabela-col6">fruteira@gmail.com</td>
                                    <td class="cadastro-fornecedor-tabela-col7">
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
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" placeholder="(##) #####-####">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="text" type="email" class="form-control" id="email" placeholder="exemplo@exemplo.com">
                </div>
            </div>
            <a class="btn btn-success" href="path/to/settings" aria-label="Settings">
                <i class="fa fa-save" aria-hidden="true"> Salvar</i>
            </a>
            <a class="btn btn-light" href="path/to/settings" aria-label="Settings">
                <i class="fa fa-eraser"> Limpar</i>
            </a>
        </form>
    </div>
</body>

</html>