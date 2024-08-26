<?php
require_once "../dao/produtoDAO.inc.php";
require_once "../classes/produto.inc.php";
$opc = null;

if (isset($_REQUEST["opcao"])) {
    $opc = $_REQUEST["opcao"];
}

$produtoDAO = new ProdutoDAO();

switch ($opc) {
    case 1: //insert
        $produto = new Produto(
            $_REQUEST['pNome'],
            strtotime($_REQUEST['pDataFabricacao']),
            $_REQUEST['pPreco'],
            $_REQUEST['pEstoque'],
            $_REQUEST['pDescricao'],
            $_REQUEST['pResumo'],
            $_REQUEST['pReferencia'],
            $_REQUEST['pFabricante']
        );
        $produtoDAO->incluirProduto($produto);
        uploadFotos($_REQUEST['pReferencia']);

        header("Location: controllerProduto.php?opcao=2");
        break;
    case 2: //get all
    case 6:
        session_start();
        $_SESSION["produtos"] = $produtoDAO->getProdutos();

        if ($opc == 2) header("Location: ../views/exibirProdutos.php");
        else header("Location: ../views/produtosVenda.php");
        break;
    case 3: //delete
        $id = $_REQUEST['id'];
        deleteFotos($produtoDAO->getProduto($id)->getReferencia());
        $produtoDAO->delete($id);
        header("Location: controllerProduto.php?opcao=2");
        break;

    case 4: //get by id
        $id = (int)$_REQUEST['id'];
        $produto = $produtoDAO->getProduto($id);

        if (isset($produto)) {
            session_start();
            $_SESSION["produto"] = $produto;

            header("Location: ../controlers/controllerFabricante.php?opcao=3");
        }
        break;

    case 5: //update
        $dataFabricacao = strtotime($_REQUEST['pDataFabricacao']);
        $produto = new Produto(
            $_REQUEST['pNome'],
            $dataFabricacao,
            $_REQUEST['pPreco'],
            $_REQUEST['pEstoque'],
            $_REQUEST['pDescricao'],
            $_REQUEST['pResumo'],
            $_REQUEST['pReferencia'],
            $_REQUEST['pFabricante']
        );
        $produto->setProdutoId($_REQUEST['pId']);

        $produtoDAO->atualizarProduto($produto);

        header("Location: ../controlers/controllerProduto.php?opcao=2");
        break;
    default:
        break;
}

function uploadFotos($ref)
{
    if (isset($_FILES["imagem"])) {
        $imagem = $_FILES["imagem"];
        $nome_temporario = $_FILES["imagem"]['tmp_name'];

        copy($nome_temporario, "../views/imagens/produtos/$ref.jpg");
    } else {
        echo "Você não realizou o upload de forma satisfatória.";
    }
}

function deleteFotos($ref)
{
    $arq = "../views/imagens/produtos/$ref.jpg";

    if (file_exists($arq)) {
        if (!unlink($arq)) {
            echo "Não foi possível deletar o arquivo";
        }
    }
}
