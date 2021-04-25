<?php

include_once('Dao.php');

class ProdutoDao extends Dao
{
    private $table_name = 'w2produto';

    public function insert($produto)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, descricao, foto, fornecedor, quantidade, preco) VALUES" . " (:nome, :descricao, :foto, :fornecedor, :quantidade, :preco)";

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":foto", $produto->getFoto());
        $stmt->bindValue(":fornecedor", $produto->getFornecedor()->getId());
        $stmt->bindValue(":quantidade", $produto->getEstoque()->getQuantidade());
        $stmt->bindValue(":preco", $produto->getEstoque()->getPreco());

        try {
            $stmt->execute();
            $id = $this->conn->lastInsertId();
            return $id;
        }catch ( PDOException $Exception){
            print_r($Exception->getMessage( ) . '' . $Exception->getCode( ));
        }
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $produtos = [];
        $pgDaoFactory = new PgDaoFactory();
        $fornecedorDao = $pgDaoFactory->getFornecedorDao();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $fornecedor = $fornecedorDao->getOneById($row['fornecedor']);
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto'], $fornecedor, $row['quantidade'], $row['preco']);

            $produtos[] = $produto;
        }
        return $produtos;
    }

    public function getOneById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $pgDaoFactory = new PgDaoFactory();
            $fornecedor = $pgDaoFactory->getFornecedorDao()->getOneById($row['fornecedor']);
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto'], $fornecedor, $row['quantidade'], $row['preco']);
        }

        return $produto;
    }

    public function update($produto) {

        $query = "UPDATE " .
            $this->table_name .
            " SET 
            nome = :nome, 
            descricao = :descricao,
            foto = :foto,  
            fornecedor = :fornecedor,
            quantidade = :quantidade,
            preco = :preco".
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":id", $produto->getId());
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":foto", $produto->getFoto());
        $stmt->bindValue(":fornecedor", $produto->getFornecedor()->getId());
        $stmt->bindValue(":quantidade", $produto->getEstoque()->getQuantidade());
        $stmt->bindValue(":preco", $produto->getEstoque()->getPreco());

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}