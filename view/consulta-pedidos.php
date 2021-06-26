<?php

require_once __DIR__ . '\..\controller\MainController.php';
include_once("../dao/PgDaoFactory.php");
include_once("../model/Fornecedor.php");
include_once("../model/Endereco.php");
include_once("../model/Produto.php");
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
                                    <th class="consulta-pedido-tabela-col5">Valor</th>
                                    <th class="consulta-pedido-tabela-col6">Situacao</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <?php
                                    foreach ($pedidos as $linha) {

                                        $valor = 0;
                                        foreach($linha->getItens() as $linha2){
                                            $valor = $valor + ( $linha2->getPreco() * $linha2->getQuantidade() );
                                        }
                                        echo '<tr class="clickable-row">';
                                        echo '<td class="consulta-pedido-tabela-col1">' . $linha->getNumero() . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col2">' . $linha->getCliente()->getNome() . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col3">' . $linha->getDataPedido() . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col4">' . $linha->getDataEntrega() . '</td>';
                                        echo '<td class="consulta-pedido-tabela-col5">' . $valor . '</td>';
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
                    <div id="update" style="display:none">
                        <form class="cadastro-fornecedor-form" action="../controller/AtualizaPedidosController.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="pedido">Nº pedido</label>
                                    <input type="text" class="form-control" id="pedido" name="pedido" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cliente">Cliente</label>
                                    <input type="text" class="form-control" id="cliente" name="cliente" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="valor">Valor</label>
                                    <input type="text" class="form-control" id="valor" name="valor" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="dataPedido">Data pedido</label>
                                    <input type="date" class="form-control" id="dataPedido" name="dataPedido">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dataEntrega">Data entregra</label>
                                    <input type="date" class="form-control" id="dataEntrega" name="dataEntrega">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="situacao">Situação</label>
                                    <select class="custom-select mr-sm-2" name="situacao" id="situacao">
                                        <option value="NOVO">NOVO</option>
                                        <option value="CANCELADO">CANCELADO</option>
                                        <option value="ENTREGUE">ENTREGUE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline consulta-pedido-editar">
                                <div class="form-group col-md-2">
                                    <input type="submit" class="btn btn-success" value="Salvar" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    echo "<div id='div_item'></div>";
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