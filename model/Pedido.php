<?php

include_once("../model/Cliente.php");

class Pedido
{
    private $numero;
    private $dataPedido;
    private $dataEntrega;
    private $situacao;
    private $cliente;
    private $itens;//array

    public function __construct($numero, $dataPedido, $dataEntrega, $situacao, $cliente, $itens)
    {
        $this->numero = $numero;
        $this->dataPedido = $dataPedido;
        $this->dataEntrega = $dataEntrega;
        $this->situacao = $situacao;
        $this->cliente = $cliente;
        $this->itens = $itens;
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

    public function getItens()
    {
        return $this->itens;
    }

    public function getDadosParaJSON()
    {

        $valor = 0;
        foreach ($this->getItens() as $linha2) {
            $valor = $valor + ($linha2->getPreco() * $linha2->getQuantidade());
        }
        $itensJson = [];
        foreach ($this->getItens() as $linha) {
            $itensJson[] = $linha->getDadosParaJSONSemImagem();
        }

        $data = ['pedido' => $this->getNumero(),
            'cliente' => $this->getCliente()->getNome(),
            'dataP' => $this->getDataPedido(),
            'dataE' => $this->getDataEntrega(),
            'itens' => $itensJson,
            'valor' => $valor,
            'situacao' => $this->getSituacao()];

        return $data;
    }
}