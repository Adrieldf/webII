<?php

class ItemPedido
{
    private $quantidade;
    private $preco;

    private $produto;

    public function __construct($quantidade, $preco, $produto)
    {
        $this->quantidade = $quantidade;
        $this->preco = $preco;
        $this->produto = $produto;
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
        $data = ['quantidade' => $this->quantidade, 'preco' => $this->preco,'produto' => $this->produto];
        return $data;
    }

}