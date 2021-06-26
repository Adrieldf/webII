<?php

class ItemPedido
{
    private $pedido;
    private $quantidade;
    private $preco;
    private $cliente;
    private $produto;

    public function __construct($pedido, $quantidade, $preco, $cliente, $produto)
    {
        $this->quantidade = $quantidade;
        $this->preco = $preco;
        $this->produto = $produto;
    }

    public function getCliente(){
        return $this->cliente;
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
        $data = ['quantidade' => $this->quantidade, 'preco' => $this->preco,'produto' => $this->produto];
        return $data;
    }

}