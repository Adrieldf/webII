<?php

class ItemPedido
{
    private $pedido;
    private $quantidade;
    private $preco;
    private $produto;

    public function __construct($pedido, $quantidade, $preco, $produto)
    {
        $this->quantidade = $quantidade;
        $this->preco = $preco;
        $this->produto = $produto;
    }

    public function getPedido(){
        return $this->pedido;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function getDadosParaJSON() {

        //$data = ['quantidade' => $this->quantidade, 'preco' => $this->preco,'produto' => $this->preco];
         $data = 
            ['imagem' => "imagem",
            'descricao' => $this->getProduto()->getDescricao(),
            'quantidade' => $this->quantidade, 
            'preco' => $this->preco,
            'valorTotal' => $this->preco * $this->quantidade];
        return $data;
    }

}