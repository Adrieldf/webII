<?php

class Pedido
{
    private $numero;
    private $dataPedido;
    private $dataEntrega;
    private $situacao;

    public function __construct($numero, $dataPedido, $dataEntrega, $situacao)
    {
        $this->numero = $numero;
        $this->dataPedido = $dataPedido;
        $this->dataEntrega = $dataEntrega;
        $this->situacao = $situacao;
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