<?php

class Estoque
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

    public function setQuantidade($quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): void
    {
        $this->preco = $preco;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto): void
    {
        $this->produto = $produto;
    }



}