<?php
require_once "../dao/fabricanteDAO.inc.php";

$opcao = (int)$_REQUEST["opcao"];

switch ($opcao) {
    case 1:
    case 2:
    case 3: //Obter lista de fabricantes
        $fabricanteDAO = new FabricanteDAO();

        $lista = $fabricanteDAO->getFrabicantes();

        session_start();

        $_SESSION["fabricantes"] = $lista;

        if ($opcao == 1) {
            header("Location: ../restrito/exibirFabricantes.php");
        } else {
            if ($opcao == 2) {
                header("Location: ../restrito/formProduto.php");
            } else {
                header("Location: ../restrito/formProdutoAtualizar.php");
            }
        }
        break;
    case 4: //Obter fabricante
        $codigo = (int)$_REQUEST["codigo"];

        $fabricanteDAO = new FabricanteDAO();

        $fabricante = $fabricanteDAO->getFabricante($codigo);

        session_start();

        $_SESSION["fabricante"] = $fabricante;

        header("Location: ../restrito/formFabricanteAtualizar.php");
        break;
    case 5: //Inserir fabricante
        $codigo = (int)$_REQUEST["codigo"];
        $nome = $_REQUEST["nome"];
        $logradouro = $_REQUEST["logradouro"];
        $cep = $_REQUEST["cep"];
        $cidade = $_REQUEST["cidade"];
        $email = $_REQUEST["email"];
        $ramo = $_REQUEST["ramo"];

        $fabricante = new stdClass();
        $fabricante->codigo = $codigo;
        $fabricante->nome = $nome;
        $fabricante->logradouro = $logradouro;
        $fabricante->cep = $cep;
        $fabricante->cidade = $cidade;
        $fabricante->email = $email;
        $fabricante->ramo = $ramo;

        $fabricanteDAO = new FabricanteDAO();

        $fabricanteDAO->insertFabricante($fabricante);

        header("Location: controllerFabricante.php?opcao=1");
        break;
    case 6: //Atualizar fabricante
        session_start();
        $codigo = $_SESSION["fabricante"]->codigo;
        $nome = $_REQUEST["nome"];
        $logradouro = $_REQUEST["logradouro"];
        $cep = $_REQUEST["cep"];
        $cidade = $_REQUEST["cidade"];
        $email = $_REQUEST["email"];
        $ramo = $_REQUEST["ramo"];

        $fabricante = new stdClass();
        $fabricante->codigo = $codigo;
        $fabricante->nome = $nome;
        $fabricante->logradouro = $logradouro;
        $fabricante->cep = $cep;
        $fabricante->cidade = $cidade;
        $fabricante->email = $email;
        $fabricante->ramo = $ramo;

        $fabricanteDAO = new FabricanteDAO();

        $fabricanteDAO->updateFabricante($fabricante);

        header("Location: controllerFabricante.php?opcao=4&codigo=$codigo");
        break;
    case 7: //Excluir fabricante
        $codigo = (int)$_REQUEST["codigo"];

        $fabricanteDAO = new FabricanteDAO();

        $fabricanteDAO->deleteFabricante($codigo);

        header("Location: controllerFabricante.php?opcao=1");
        break;
}
