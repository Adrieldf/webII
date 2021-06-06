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
$daoF = $pgDaoFactory->getPedidoDao();
$pedidos = $daoF->getAll();

$dao2 = $pgDaoFactory->getItensPedidoDao();
$itens = $dao2->getAll();;

?>

<body>
    <div class="container-fluid p-3 my-3">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="container-fluid border ">
                    <div class="col-md-12 consulta-pedidos-pesquisar">
                        <div class="form-row row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero">Número pedido</label>
                                    <input type="text" class="form-control" id="numero" name="numero">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nome">Nome cliente</label>
                                    <input type="nome" class="form-control" id="nome" name="nome">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary botao-pesquisar" value="Pesquisar" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border ">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-condensed ">
                            <thead>
                                <tr>
                                    <th class="consulta-pedido-tabela-col1">Nº pedido</th>
                                    <th class="consulta-pedido-tabela-col2">Cliente</th>
                                    <th class="consulta-pedido-tabela-col3">Data pedido</th>
                                    <th class="consulta-pedido-tabela-col4">Data entrega</th>
                                    <th class="consulta-pedido-tabela-col5">Valor total</th>
                                    <th class="consulta-pedido-tabela-col6">Situacao</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <?php
                                    foreach ($pedidos as $linha) {
                                        echo '<tr class="clickable-row">';
                                        echo '<td class="consulta-pedido-tabela-col1">' . $linha->getNumero() . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col2">' . "Nome" . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col3">' . $linha->getDataPedido() . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col4">' . $linha->getDataEntrega() . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col5">' . "Total" . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col6">' . $linha->getSituacao() . '</td>';
                                        echo '</tr>';
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="container-fluid border ">
                    <?php
                    echo "<div id='div_item'></div>";
                    /*foreach ($itens as $linha) {
                        echo '<tr class="clickable-row">';
                        echo '<td class="consulta-pedido-tabela-col1">TESTE</td>';
                        echo '</tr>';
                    }*/
                    ?>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/PedidosScripts.js"></script>
</body>

</html>