<?php
final class fabricante 
{
    public function __construct(
        private int $codigo,
        private string $nome,
        private string $logradouro,
        private string $cep,
        private string $cidade,
        private string $email,
        private string $ramo) {}
 
    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
?>