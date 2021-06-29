<?php
session_start();

include_once("../dao/PgDaoFactory.php");

$id = @$_POST['id'];
$carrinho = @$_SESSION["carrinho"];

$pgDaoFactory = new PgDaoFactory();
$encontrou = 0;

echo $carrinho->getNumero();

$dao = $pgDaoFactory->getPedidoDao();
$produto = $dao->getOneProdutoById($id);
foreach($carrinho as $linha){
    if(is_null($linha->getItens()->getProduto()->getId())){

    }
    else{
        $encontrou = 1;
        $quantidade = $linha->getItens()->getQuantidade();
        $quantidade = $quantidade +1;
        $linha->getItens()->setQuantidade($quantidade);
    }
}

if($encontrou==0){
    //$itens = $linha->getItens();
    $itens[] = new ItemPedido(NULL,1,$produto->getEstoque()->getPreco(), $produto);
    $carrinho->setItens($itens[]);
}

echo $dao->setItensJSON($carrinho->getItens());

?>