<?php
require_once "../dao/clienteDAO.inc.php";
$clienteDao = new ClienteDao();

$opc = (int)$_REQUEST["pOpcao"];

switch( $opc ){
    case 1; //Login
    //recupero as informações do login
    $email = $_REQUEST["pEmail"];
    $senha = $_REQUEST["pSenha"];

    //passo o email e senha para ser autenticado pelo clienteDao
    $cliente = $clienteDao->autenticar($email, $senha);

    //verifica as credenciais correponde a algum cliente
    if ($cliente != null) {
        session_start();
        $_SESSION["cliente"] = $cliente;
        $emCompra = (int)$_REQUEST["em_compra"];

        if ($emCompra == 1) {
            header("Location: controllerCarrinho.php?opcao=5");
        } else {

            if (isset($_SESSION["carrinho"]) && sizeof($_SESSION["carrinho"]) > 0) {
                header("Location: ../exibirCarrinho.php");
            } else {
                header("Location: controllerProduto.php?opcao=6");
            }
        }
    } else {
        header("Location: ../formLogin.php?erro=1");
    }
    break;
    case 2: //Logout
        session_start();
        unset($_SESSION["cliente"]);
        header("Location: ../index.php");
    break;
    case 3://cadastro
        $cliente = new Cliente(
            $_REQUEST["cpf"],
            $_REQUEST["nome"],
            $_REQUEST["logradouro"],
            $_REQUEST["cidade"],
            $_REQUEST["estado"],
            $_REQUEST["cep"],
            $_REQUEST["telefone"],
            $_REQUEST["dataNascimento"],
            $_REQUEST["email"],
            $_REQUEST["senha"],
            $_REQUEST["rg"],
            isset($_REQUEST["tipo"]) ? $_REQUEST["tipo"] : "C"
        );

        $clienteDao->cadastrar($cliente);

        header("Location: ../formLogin.php");
    break;
    case 4: //atualizar
        $cliente = new Cliente(
            $_REQUEST["cpf"],
            $_REQUEST["nome"],
            $_REQUEST["logradouro"],
            $_REQUEST["cidade"],
            $_REQUEST["estado"],
            $_REQUEST["cep"],
            $_REQUEST["telefone"],
            $_REQUEST["dataNascimento"],
            $_REQUEST["email"],
            $_REQUEST["senha"],
            $_REQUEST["rg"],
            isset($_REQUEST["tipo"]) ? $_REQUEST["tipo"] : "C"
        );

        $clienteDao->atualizar($cliente);

        session_start();
        $_SESSION["cliente"] = $cliente;

        header("Location: ../restrito/formClienteAtualizar.php");
    break;
    case 5: //excluir
        $cpf = $_REQUEST["cpf"];
        $clienteDao->excluir($cpf);

        header("Location: controlerCliente.php?pOpcao=2");
    break;
}