<?php
require_once "../dao/fabricanteDAO.inc.php";

$opcao = (int)$_REQUEST["opcao"];

switch ($opcao) {
    case 1:
        # code...
        break;
    case 2:
    case 3:
        $fabricanteDAO = new FabricanteDAO();

        $lista = $fabricanteDAO->getFrabicantes();

        session_start();

        $_SESSION["fabricantes"] = $lista;

        if($opcao == 2){
            header("Location: ../views/formProduto.php");
        }else{
            header("Location: ../views/formProdutoAtualizar.php");
        }
        break;
    default:
        # code...
        break;
}
?>