<?php
final class venda
{
    private $id_venda;
    private $data;

    public function __construct(private $cpf, private $valor) {
        $this->data = time();
    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value) : self {
        $this->$name = $value;

        return $this;
    }
}

?>