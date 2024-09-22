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
    case 1: //Adicionar produto ao carrinho
        $id = $_REQUEST["id"];

        $prod = $produtoDAO->getProduto($id);
        $item = new Item($prod);

        session_start();
        $carrinho = $_SESSION["carrinho"];
        if(!isset($carrinho)){
            $carrinho = [];
        }

        //Verifica se o produto já está no carrinho
        $index = array_search2($item->getProduto()->getProdutoId(), $carrinho);
        if($index != -1){
            $key = array_search($item, $carrinho);

            $carrinho[$key]->incrementaQtd();
            $carrinho[$key]->setValorItem();
        }else{
            $carrinho[] = $item;
        }

        $_SESSION["carrinho"] = $carrinho;
        header("Location: ../views/exibirCarrinho.php");
        break;
    case 2://Remover produto do carrinho
        $index = (int)$_REQUEST['index'];

        session_start();
        $carrinho = $_SESSION['carrinho'];

        unset($carrinho[$index]);
        sort($carrinho);
        $_SESSION["carrinho"] = $carrinho;

        header("Location: controllerCarrinho.php?opcao=4");
    break;
    case 3://Limpar carrinho
        session_start();
        unset($_SESSION["carrinho"]);
        header("Location: controllerProduto.php?opcao=6");
        break;
    case 4://Exibir carrinho
        session_start();

        if(!isset($_SESSION['carrinho']) || sizeof($_SESSION["carrinho"])==0){
            header("Location: ../views/exibirCarrinho.php?status=1");
        }else{
            header("Location: ../views/exibirCarrinho.php");
        }
    break;
    case 5://Finalizar compra
        session_start();

        if(isset($_SESSION["cliente"])){
            header("Location: ../views/dadosCompra.php");
        }else{
            header("Location: ../views/formLogin.php?em_compra=1"); 
        }

        break;
    case 6://atualizando quantidade de item
        $id = $_REQUEST["id"];
        $qtd = $_REQUEST["qtd"];
        session_start();
        $carrinho = $_SESSION["carrinho"];

        $index = array_search2($id, $carrinho);

        if($index != -1){
            if($carrinho[$index]->getProduto()->getEstoque() < $qtd){
                $qtd = $carrinho[$index]->getProduto()->getEstoque();
            }
            $carrinho[$index]->setQtd($qtd);
            $carrinho[$index]->setValorItem();
        }

        $_SESSION["carrinho"] = $carrinho;
        header("Location: ../views/exibirCarrinho.php");
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