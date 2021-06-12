<?php

include_once("../model/Cliente.php");

class Pedido
{
    private $numero;
    private $dataPedido;
    private $dataEntrega;
    private $situacao;
    private $cliente;

    public function __construct($numero, $dataPedido, $dataEntrega, $situacao)
    {
        $this->numero = $numero;
        $this->dataPedido = $dataPedido;
        $this->dataEntrega = $dataEntrega;
        $this->situacao = $situacao;
        $this->cliente = new Cliente(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    public function getDataEntrega()
    {
        return $this->dataEntrega;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

}