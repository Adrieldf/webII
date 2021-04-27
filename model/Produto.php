<?php

include_once("../model/Estoque.php");

class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $foto;

    private $fornecedor;
    private $estoque;

    private $itens;

    public function __construct($id, $nome, $descricao, $foto, $fornecedor, $quantidade, $preco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->foto = $foto;
        $this->fornecedor = $fornecedor;
        $this->estoque = new Estoque($quantidade, $preco, $this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function getItens()
    {
        return $this->itens;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }



}