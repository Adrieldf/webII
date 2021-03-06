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

    private $senha;

    public function __construct($id, $nome, $telefone, $email, $cartaoCredito, $endereco, $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cartaoCredito = $cartaoCredito;

        $this->endereco = $endereco;
        $this->senha = $senha;
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

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setCartaoCredito($cartaoCredito)
    {
        $this->cartaoCredito = $cartaoCredito;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setPedidos($pedidos)
    {
        $this->pedidos = $pedidos;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function toJSON(){
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco->toJSON(),
        ];
    }
}