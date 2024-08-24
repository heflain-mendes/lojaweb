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
}

?>