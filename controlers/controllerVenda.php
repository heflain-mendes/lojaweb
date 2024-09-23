<?php
require_once '../classes/venda.inc.php';
require_once '../dao/vendaDAO.inc.php';
require_once '../dao/produtoDAO.inc.php';

$opcao = (int)$_REQUEST['opcao'];


switch ($opcao) {
    case 1:
        session_start();

        $carrinho = $_SESSION['carrinho'];
        $cliente = $_SESSION['cliente'];
        $total = $_SESSION['total'];

        $venda = new venda($cliente["cpf"], $total);

        $daoVenda = new vendaDAO();
        $daoProduto = new ProdutoDAO();

        $daoVenda->incluirVenda($venda, $carrinho);
        
        foreach($carrinho as $item){
            $produto = $item->getProduto();
            $produto->setEstoque($produto->getEstoque() - $item->getQtd());
            $daoProduto->atualizarProduto($produto);
        }

        $tipo = $_REQUEST['pag'];
        unset($_SESSION['carrinho']);

        if($tipo == "boleto"){
            header("Location: ../restrito/boleto/meuBoleto.php");
        }else{
            echo "Validar compra com cartão";
        }
        break;
}

?>