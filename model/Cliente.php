<?php

class Cliente
{
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $cartaoCredito;

    private $endereco;
    private $pedidos;


    public function __construct($id, $nome, $telefone, $email, $cartaoCredito)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cartaoCredito = $cartaoCredito;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCartaoCredito()
    {
        return $this->cartaoCredito;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getPedidos()
    {
        return $this->pedidos;
    }


}