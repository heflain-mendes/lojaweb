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
        if(!isset($_SESSION["carrinho"])){
            $_SESSION["carrinho"] = [];
        }

        $_SESSION["carrinho"][] = $item;

        header("Location: ../views/exibirCarrinho.php");
        break;
}
?>