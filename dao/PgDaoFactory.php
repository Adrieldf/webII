<?php

include_once('DaoFactory.php');
include_once('ClienteDao.php');
include_once('ProdutoDao.php');
include_once('FornecedorDao.php');
include_once('PedidoDao.php');
include_once('ItensPedidoDao.php');

class PgDaoFactory extends DaoFactory
{

    private $host = "35.198.51.18";
    private $db_name = "abrshrgy";
    private $username = "abrshrgy";
    private $password = "xePST8sb0aHgwg8DtXlHbOQua9rOXTCh";
    public $conn;

    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function getClienteDao() {

        return new ClienteDao($this->getConnection());
    }

    public function getProdutoDao() {

        return new ProdutoDao($this->getConnection());
    }

    public function getFornecedorDao() {

        return new FornecedorDao($this->getConnection());
    }

    public function getPedidoDao() {

        return new PedidoDao($this->getConnection());
    }

    public function getItensPedidoDao(){
        return new ItensPedidoDao($this->getConnection());
    }
}