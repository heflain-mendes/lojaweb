<?php
require_once "../classes/cliente.php";
require_once "conexao.inc.php";
require_once "../utils/funcoesUteis.php";

class ClienteDao{
    private PDO $con;

    public function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function autenticar($email, $senha) : Cliente | null {
        $sql = $this->con->prepare("select * from clientes where email = :email and senha = :senha AND desativado = 0");

        $email = strtolower($email);
        $senha = strtolower($senha);

        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        $cliente = null;

        if($sql->rowCount() == 1){
            $cliente = $sql->fetch(PDO::FETCH_ASSOC);
        }

        return $cliente == null ? null : $this->getCliente($cliente);
    }

    public function cadastrar(Cliente $cliente){
        $sql = $this->con->prepare("
        insert into clientes 
        (cpf, nome, logradouro, cidade, estado, cep, telefone, data_nascimento, email, senha, rg, tipo)
        values(
            :cpf, 
            :nome, 
            :logradouro, 
            :cidade, 
            :estado, 
            :cep, 
            :telefone, 
            :dataNascimento, 
            :email, 
            :senha, 
            :rg, 
            :tipo
        )");

        $sql->bindValue(":cpf", $cliente->cpf);
        $sql->bindValue(":nome", $cliente->nome);
        $sql->bindValue(":logradouro", $cliente->logradouro);
        $sql->bindValue(":cidade", $cliente->cidade);
        $sql->bindValue(":estado", $cliente->estado);
        $sql->bindValue(":cep", $cliente->cep);
        $sql->bindValue(":telefone", $cliente->telefone);
        $sql->bindValue(":dataNascimento", parseISO($cliente->dataNascimento));
        $sql->bindValue(":email", $cliente->email);
        $sql->bindValue(":senha", $cliente->senha);
        $sql->bindValue(":rg", $cliente->rg);
        $sql->bindValue(":tipo", $cliente->tipo);

        $sql->execute();
    }

    public function Atualizar(Cliente $cliente) {
        $sql = $this->con->prepare("
        update clientes set
        nome = :nome,
        logradouro = :logradouro,
        cidade = :cidade,
        estado = :estado,
        cep = :cep,
        telefone = :telefone,
        data_nascimento = :dataNascimento,
        email = :email,
        senha = :senha,
        rg = :rg,
        tipo = :tipo
        where cpf = :cpf");

        $sql->bindValue(":cpf", $cliente->cpf);
        $sql->bindValue(":nome", $cliente->nome);
        $sql->bindValue(":logradouro", $cliente->logradouro);
        $sql->bindValue(":cidade", $cliente->cidade);
        $sql->bindValue(":estado", $cliente->estado);
        $sql->bindValue(":cep", $cliente->cep);
        $sql->bindValue(":telefone", $cliente->telefone);
        $sql->bindValue(":dataNascimento", parseISO($cliente->dataNascimento));
        $sql->bindValue(":email", $cliente->email);
        $sql->bindValue(":senha", $cliente->senha);
        $sql->bindValue(":rg", $cliente->rg);
        $sql->bindValue(":tipo", $cliente->tipo);
        
        $sql->execute();
    }

    public function excluir($cpf){
        $sql = $this->con->prepare("update clientes set desativado = 1 where cpf = :cpf");

        $sql->bindValue(":cpf", $cpf);

        $sql->execute();
    }

    private function getCliente($cliente) : Cliente{
        return new Cliente(
            $cliente['cpf'],
            $cliente['nome'],
            $cliente['logradouro'],
            $cliente['cidade'],
            $cliente['estado'],
            $cliente['cep'],
            $cliente['telefone'],
            $cliente['data_nascimento'],
            $cliente['email'],
            $cliente['senha'],
            $cliente['rg'],
            $cliente['tipo']
        );
    }
}