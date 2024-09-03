<?php
require_once '../dao/produtoDAO.inc.php';
require_once "../classes/produto.inc.php";
require_once "../classes/item.inc.php";
$opcao = null;
$produtoDAO = null;

if(isset($_REQUEST["opcao"])) {
    $opcao = $_REQUEST["opcao"];
    $produtoDAO = new ProdutoDAO();
}

switch ($opcao) {
    case 1: 
        $id = $_REQUEST["id"];

        $prod = $produtoDAO->getProduto($id);
        $item = new Item($prod);

        session_start();
        $carrinho = $_SESSION["carrinho"];
        if(!isset($carrinho)){
            $carrinho = [];
        }

        $index = array_search2($item->getProduto()->getProdutoId(), $carrinho);
        if($index != -1){
            $key = array_search($item, $carrinho);

            $carrinho[$key]->setQtd();
            $carrinho[$key]->setValorItem();
        }else{
            $carrinho[] = $item;
        }

        $_SESSION["carrinho"] = $carrinho;
        header("Location: ../views/exibirCarrinho.php");
        break;
    case 2:
        $index = (int)$_REQUEST['index'];

        session_start();
        $carrinho = $_SESSION['carrinho'];

        unset($carrinho[$index]);
        sort($carrinho);
        $_SESSION["carrinho"] = $carrinho;

        header("Location: controllerCarrinho.php?opcao=4");
    break;
    case 3:
        session_start();
        unset($_SESSION["carrinho"]);
        header("Location: controllerProduto.php?opcao=6");
        break;
    case 4:
        session_start();

        if(!isset($_SESSION['carrinho']) || sizeof($_SESSION["carrinho"])==0){
            header("Location: ../views/exibirCarrinho.php?status=1");
        }else{
            header("Location: ../views/exibirCarrinho.php");
        }
    break;
    case 5:
        $total = $_REQUEST["total"];
        session_start();
        $_SESSION["total"] = $total;

        if(isset($_SESSION["cliente"])){
            header("Location: ../views/dadosCompra.php");
        }else{
            header("Location: ../views/formLogin.php"); 
        }

        break;
}

function array_search2($chave, $vetor) {
    $index = -1;
    for($i=0; $i<count($vetor);$i++){
        if($chave == $vetor[$i]->getProduto()->getProdutoId()){
            $index = $i;
            break;
        }
    }

    return $index;
}
?>