<?php

class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $foto;

    private $fornecedor;
    private $estoques;

    private $itens;

    public function __construct($id, $nome, $descricao, $foto)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->foto = $foto;
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

    public function getEstoques()
    {
        return $this->estoques;
    }

    public function getItens()
    {
        return $this->itens;
    }


}