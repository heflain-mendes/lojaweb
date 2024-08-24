<?php
require_once "conexao.inc.php";
require_once "../utils/funcoesUteis.php";

final class ProdutoDAO 
{
    private PDO $conn;

    public function __construct() {
        $c = new Conexao();
        $this->conn = $c->getConexao();
    }

    public function incluirProduto(Produto $produto) {
        $sql = $this->conn->prepare("
            insert into produtos (
                nome, 
                data_fabricacao, 
                preco, 
                estoque, 
                descricao, 
                resumo, 
                referencia, 
                cod_fabricante
            )
            values (
                :nome, 
                :data_fabricacao, 
                :preco, 
                :estoque, 
                :descricao, 
                :resumo, 
                :referencia, 
                :cod_fabricante
            )
        ");

        $sql->bindValue(":nome", $produto->getNome());
        $sql->bindValue(":data_fabricacao", parseTimestamp($produto->getDataFabricacao()));
        $sql->bindValue(":preco", $produto->getPreco());
        $sql->bindValue(":estoque", $produto->getEstoque());
        $sql->bindValue(":descricao", $produto->getDescricao());
        $sql->bindValue(":resumo", $produto->getResumo());
        $sql->bindValue(":referencia", $produto->getReferencia());
        $sql->bindValue(":cod_fabricante", $produto->getCodFabricante());

        $sql->execute();
    }

    public function getProdutos(){
        $sql = $this->conn->query("
        SELECT 
            produto_id,
            p.nome as nome, 
            data_fabricacao, 
            preco, 
            estoque, 
            descricao, 
            resumo, 
            referencia, 
            cod_fabricante,
            f.nome as nome_fabricante
        FROM produtos p
        INNER JOIN fabricantes f
        ON p.cod_fabricante = f.codigo");

        $r = [];
        if($sql->rowCount() > 0){
            while ($p = $sql->fetch(PDO::FETCH_OBJ)) {
                $produto = new Produto(
                    $p->nome,
                    strtotime($p->data_fabricacao),
                    $p->preco,
                    $p->estoque,
                    $p->descricao,
                    $p->resumo,
                    $p->referencia,
                    $p->cod_fabricante
                );

                $produto->setProdutoId($p->produto_id);
                $produto->setNomeFabricante($p->nome_fabricante);

                $r[] = $produto;
            }
        }

        return $r;
    }

    public function delete(int $id) {
        $sql = $this->conn->prepare("DELETE FROM produtos WHERE produto_id = :id");
        $sql->bindValue(":id", $id);

        $sql->execute();
    }

    public function getProduto(int $id) : Produto {
        $sql = $this->conn->prepare("
        SELECT 
            produto_id,
            p.nome as nome, 
            data_fabricacao, 
            preco, 
            estoque, 
            descricao, 
            resumo, 
            referencia, 
            cod_fabricante,
            f.nome as nome_fabricante
        FROM produtos p
        INNER JOIN fabricantes f
        ON p.cod_fabricante = f.codigo
        WHERE produto_id = :id
        ");

        $sql->bindValue(":id", $id);
        $sql->execute();

        $p = $sql->fetch(PDO::FETCH_OBJ);
        $produto = new Produto(
            $p->nome,
            strtotime($p->data_fabricacao),
            $p->preco,
            $p->estoque,
            $p->descricao,
            $p->resumo,
            $p->referencia,
            $p->cod_fabricante
        );

        $produto->setProdutoId($p->produto_id);
        $produto->setNomeFabricante($p->nome_fabricante);

        return $produto;
    }

    public function atualizarProduto(Produto $produto) {
        $sql = $this->conn->prepare("
            UPDATE produtos 
                SET
                   nome = :nome, 
                   data_fabricacao = :data_fabricacao, 
                   preco = :preco, 
                   estoque = :estoque, 
                   descricao = :descricao, 
                   resumo = :resumo, 
                   referencia = :referencia, 
                   cod_fabricante = :cod_fabricante
                WHERE
                    produto_id = :produto_id
        ");

        $data = parseISO($produto->getDataFabricacao());
        $sql->bindValue(":produto_id", $produto->getProdutoId());
        $sql->bindValue(":nome", $produto->getNome());
        $sql->bindValue(":data_fabricacao", $data);
        $sql->bindValue(":preco", $produto->getPreco());
        $sql->bindValue(":estoque", $produto->getEstoque());
        $sql->bindValue(":descricao", $produto->getDescricao());
        $sql->bindValue(":resumo", $produto->getResumo());
        $sql->bindValue(":referencia", $produto->getReferencia());
        $sql->bindValue(":cod_fabricante", $produto->getCodFabricante());

        $sql->execute();
    }
}

?>