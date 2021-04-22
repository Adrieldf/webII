<?php

class Fornecedor
{
    private $id;
    private $nome;
    private $descricao;
    private $telefone;
    private $email;

    private $endereco;
    private $produtos;

    public function __construct($id, $nome, $descricao, $telefone, $email, $endereco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->endereco = $endereco;
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

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }
}