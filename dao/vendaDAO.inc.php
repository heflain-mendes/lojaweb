<?php
require_once "../utils/funcoesUteis.php";
require_once "../classes/produto.inc.php";
require_once "../classes/item.inc.php";

final class vendaDAO
{
    private PDO $con;

    public function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    private function getIdVenda() {
        return $this->con->query("select MAX(id_venda) as maior
        from vendas");

        $row = $sql->fetch(PDO::FETCH_OBJ);

        return $row->maior;
    }

    private function incluirItens($idVenda, $carrinho) {
        foreach ($carrinho as $item) {
            $sql = $this->con->prepare("insert into itens 
            (id_produto, quantidade, valorTotal, id_Venda)
            values (:idPub, :q, :val, :idV)");

            $sql->bindValue(":idPub", $item->produto->getProdutoId());
            $sql->bindValue(":q", $item->getQtd());
            $sql->bindValue(":idV", $idVenda);

            $sql->execute();
            
        }
    }

    public function incluirVenda($venda, $carrinho){
        $sql = $this->con->prepare("insert into vendas
        (cpf_cliente, dataVenda, valorTotal)
        values (:cpf, :data, :val)
        ");

        $sql->bindValue(":cpf", $venda->cpf);
        $sql->bindValue(":data", parseISO($venda->data));
        $sql->bindValue(":val", $venda->valor);
        $sql->execute();

        $id = $this->getIdVenda();
        $this->incluirItens($id, $carrinho);
    }
}

?>