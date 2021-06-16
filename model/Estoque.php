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

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function toJSON(){
        return [
            'quantidade' => $this->quantidade,
            'preco' => $this->preco
        ];
    }
}