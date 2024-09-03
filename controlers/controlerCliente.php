<?php
require_once "../dao/clienteDAO.inc.php";
$clienteDao = new ClienteDao();

$opc = (int)$_REQUEST["pOpcao"];

if($opc == 1){
    //recupero as informações do login
    $email = $_REQUEST["pEmail"];
    $senha = $_REQUEST["pSenha"];

    //passo o email e senha para ser autenticado pelo clienteDao
    $cliente = $clienteDao->Autenticar($email, $senha);

    //verifica as credenciais correponde a algum cliente
    if($cliente != null){
        session_start();
        $_SESSION["cliente"] = $cliente;
        if(isset($_SESSION["carrinho"]) && sizeof($_SESSION["carrinho"]) > 0 ){
            header("Location: ../views/dadosCompra.php");
        }else{    
            header("Location: ../controllerProduto.php?opcao=6");
        }
    }else{
        header("Location: ../views/formLogin.php?erro=1");
    }
} else{
    if($opc == 2){
        session_start();
        unset($_SESSION["cliente"]);
        header("Location: ../views/index.php");
    }
}