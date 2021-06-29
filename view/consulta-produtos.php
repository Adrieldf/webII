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
$dao = $pgDaoFactory->getProdutoDao();
$produtos = $dao->getAll();

$today = date("y-m-d");
@$_SESSION["carrinho"] = new Pedido(NULL,$today,$today,"NOVO",@$_SESSION["id_cliente"],NULL);
?>

<body>
    <div class="container-fluid border">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="float-container">
                    <?php
                    $inicio = 1;
                    foreach ($produtos as $linha) {
                        if ($inicio == 1) {
                            echo '<div class="row">';
                            echo '<div class="float-child">';
                            echo '<div class="produto-image"><img class="produto-imagem-consulta" id="foto-produto" src="' . $linha->getFoto() . '"></div>';
                            echo '<div class="produto-desc"><p class="texto-centralizado">' . $linha->getDescricao() . '</p></div>';
                            echo '<div class="produto-info"><h6 class="texto-centralizado">R' . $linha->getEstoque()->getPreco() . '</h6></div>';
                            echo '<div class="produto-info"><input type="submit" onclick="adicionaAoCarrinho(
                                \'' . $linha->getFoto() . '\',\'' . $linha->getDescricao() . '\',\'' . $linha->getEstoque()->getPreco() . '\',' . $linha->getId(). ')" class="btn btn-primary" value="Adicionar ao carrinho" /></div>';
                            echo '</div>';

                            $inicio = $inicio + 1;
                        } else if ($inicio == 2) {
                            echo '<div class="float-child">';
                            echo '<div class="produto-image"><img class="produto-imagem-consulta" id="foto-produto" src="' . $linha->getFoto() . '"></div>';
                            echo '<div class="produto-desc"><p class="texto-centralizado">' . $linha->getDescricao() . '</p></div>';
                            echo '<div class="produto-info"><h6 class="texto-centralizado">R' . $linha->getEstoque()->getPreco() . '</h6></div>';
                            echo '<div class="produto-info"><input type="submit" onclick="adicionaAoCarrinho(
                                \'' . $linha->getFoto() . '\',\'' . $linha->getDescricao() . '\',\'' . $linha->getEstoque()->getPreco() . '\'' . ')" class="btn btn-primary" value="Adicionar ao carrinho" /></div>';
                            echo '</div>';
                            $inicio = $inicio + 1;
                        } else {
                            echo '<div class="float-child">';
                            echo '<div class="produto-image"><img class="produto-imagem-consulta" id="foto-produto" src="' . $linha->getFoto() . '"></div>';
                            echo '<div class="produto-desc"><p class="texto-centralizado">' . $linha->getDescricao() . '</p></div>';
                            echo '<div class="produto-info"><h6 class="texto-centralizado">R' . $linha->getEstoque()->getPreco() . '</h6></div>';
                            echo '<div class="produto-info"><input type="submit" onclick="adicionaAoCarrinho(
                                \'' . $linha->getFoto() . '\',\'' . $linha->getDescricao() . '\',\'' . $linha->getEstoque()->getPreco() . '\'' . ')" class="btn btn-primary" value="Adicionar ao carrinho" /></div>';
                            echo '</div>';
                            echo '</div>';
                            $inicio = 1;
                        }
                    }
                    if ($inicio != 1) {
                        echo '</div>';
                    }

                    ?>
                </div>
            </div>
            <div class="footer" id="footer" style="display:none">
                <div class="container-fluid border">
                    <h3> Carrinho</h3>
                    <div class="ex1">
                        <?php
                        echo "<div id='div_carrinho'></div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/TelaProdutosScripts.js"></script>
</body>

</html>