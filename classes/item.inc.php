<?php
require_once "produto.inc.php";

class Item {
    public int $qtd;
    public float $valorItem;
    public function __construct(
        public Produto $produto
    ) {
        $this->qtd = 1;
        $this->valorItem = $this->produto->getPreco();
    }

    public function getValorItem(): float {
        return $this->valorItem;
    }

    public function setValorItem() {
        $this->valorItem = $this->qtd * $this->produto->getPreco();
    }

    public function getQtd(): int {
        return $this->qtd;
    }

    public function setQtd() {
        $this->qtd++;
    }

    public function getProduto(): Produto{
        return $this->produto;
    }
}
?>