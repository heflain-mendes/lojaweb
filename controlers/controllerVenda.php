<?php
require_once '../classes/venda.inc.php';
require_once '../dao/vendaDAO.inc.php';

$opcao = (int)$_REQUEST['opcao'];


switch ($opcao) {
    case 1:
        session_start();

        $carrinho = $_SESSION['carrinho'];
        $cliente = $_SESSION['cliente'];
        $total = $_SESSION['total'];

        $venda = new venda($cliente["cpf"], $total);
        $dao = new vendaDAO();
        $dao->incluirVenda($venda, $carrinho);

        $tipo = $_REQUEST['pag'];
        unset($_SESSION['carrinho']);

        if($tipo == 1){
            //header("Location: ../views/boleto/meuBoleto.php");
            echo "Boleto emitido";
        }else{
            echo "Validar compra com cartão";
        }
        break;
}

?>