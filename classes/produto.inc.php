<?php
final class Produto {
    private int $produto_id;
    private string $nome_fabricante;

    // public function __get($name){
    //     return $this->$name;
    // }

    // public function __set($name, $value) : self {
    //     $this->$name = $value;

    //     return $this;
    // }

    public function __construct(
        private string $nome,
        private int $data_fabricacao,
        private float $preco,
        private int $estoque,
        private string $descricao,
        private string $resumo,
        private string $referencia,
        private int $cod_fabricante
    ) {}

    // Método para obter produto_id
    public function getProdutoId(): int {
        return $this->produto_id;
    }

    // Método para definir produto_id
    public function setProdutoId(int $produto_id): self {
        $this->produto_id = $produto_id;
        return $this;
    }

    // Método para obter nome
    public function getNome(): string {
        return $this->nome;
    }

    // Método para definir nome
    public function setNome(string $nome): self {
        $this->nome = $nome;
        return $this;
    }

    // Método para obter data_fabricante
    public function getDataFabricacao(): int {
        return $this->data_fabricacao;
    }

    // Método para definir data_fabricante
    public function setDataFabricacao(string $data_fabricante): self {
        $this->data_fabricacao = strtotime($data_fabricante);
        return $this;
    }

    // Método para obter preco
    public function getPreco(): float {
        return $this->preco;
    }

    // Método para definir preco
    public function setPreco(float $preco): self {
        $this->preco = $preco;
        return $this;
    }

    // Método para obter estoque
    public function getEstoque(): int {
        return $this->estoque;
    }

    // Método para definir estoque
    public function setEstoque(int $estoque): self {
        $this->estoque = $estoque;
        return $this;
    }

    // Método para obter descricao
    public function getDescricao(): string {
        return $this->descricao;
    }

    // Método para definir descricao
    public function setDescricao(string $descricao): self {
        $this->descricao = $descricao;
        return $this;
    }

    // Método para obter resumo
    public function getResumo(): string {
        return $this->resumo;
    }

    // Método para definir resumo
    public function setResumo(string $resumo): self {
        $this->resumo = $resumo;
        return $this;
    }

    // Método para obter referencia
    public function getReferencia(): string {
        return $this->referencia;
    }

    // Método para definir referencia
    public function setReferencia(string $referencia): self {
        $this->referencia = $referencia;
        return $this;
    }

    // Método para obter cod_fabricante
    public function getCodFabricante(): int {
        return $this->cod_fabricante;
    }

    // Método para definir cod_fabricante
    public function setCodFabricante(int $cod_fabricante): self {
        $this->cod_fabricante = $cod_fabricante;
        return $this;
    }

    public function getNomeFabricante(): string {
        return $this->nome_fabricante;
    }

    // Método para definir cod_fabricante
    public function setNomeFabricante(string $nome_fabricante): self {
        $this->nome_fabricante = $nome_fabricante;
        return $this;
    }
}
?>
