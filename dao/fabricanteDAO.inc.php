<?php
require_once "conexao.inc.php";
require_once "../utils/funcoesUteis.php";

final class FabricanteDAO 
{
    private PDO $conn;

    public function __construct() {
        $c = new Conexao();
        $this->conn = $c->getConexao();
    }

    public function getFrabicantes() {
        $sql = $this->conn->query("SELECT * FROM fabricantes");

        $lista = [];

        while($fabricante = $sql->fetch(PDO::FETCH_OBJ)){
            $lista[] = $fabricante;
        }

        return $lista;
    }

    public function getFabricante(int $codigo) {
        $sql = $this->conn->query("SELECT * FROM fabricantes WHERE codigo = $codigo");

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function insertFabricante($fabricante) {
        $sql = $this->conn->prepare("
        INSERT INTO fabricantes 
        (codigo, nome, logradouro, cep, cidade, email, ramo) 
        VALUES (:codigo, :nome, :logradouro, :cep, :cidade, :email, :ramo)");

        $sql->bindValue(":codigo", $fabricante->codigo);
        $sql->bindValue(":nome", $fabricante->nome);
        $sql->bindValue(":logradouro", $fabricante->logradouro);
        $sql->bindValue(":cep", $fabricante->cep);
        $sql->bindValue(":cidade", $fabricante->cidade);
        $sql->bindValue(":email", $fabricante->email);
        $sql->bindValue(":ramo", $fabricante->ramo);

        $sql->execute();
    }

    public function updateFabricante($fabricante) {
        $sql = $this->conn->prepare("
        UPDATE fabricantes 
        SET nome = :nome, logradouro = :logradouro, cep = :cep, cidade = :cidade, email = :email, ramo = :ramo 
        WHERE codigo = :codigo");

        $sql->bindValue(":codigo", $fabricante->codigo);
        $sql->bindValue(":nome", $fabricante->nome);
        $sql->bindValue(":logradouro", $fabricante->logradouro);
        $sql->bindValue(":cep", $fabricante->cep);
        $sql->bindValue(":cidade", $fabricante->cidade);
        $sql->bindValue(":email", $fabricante->email);
        $sql->bindValue(":ramo", $fabricante->ramo);

        $sql->execute();
    }

    public function deleteFabricante(int $codigo) {
        $sql = $this->conn->prepare("DELETE FROM fabricantes WHERE codigo = :codigo");
        $sql->bindValue(":codigo", $codigo);
        $sql->execute();
    }
}

?>