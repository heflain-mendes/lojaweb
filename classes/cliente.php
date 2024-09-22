<?php
final class Cliente
{
    private int $dataNascimento;
    public function __construct(
        private string $cpf, 
        private string $nome,
        private string $logradouro,
        private string $cidade,
        private string $estado,
        private string $cep,
        private string $telefone,
        string $dataNascimento,
        private string $email,
        private string $senha,
        private string $rg,
        private string $tipo,
    ) {
        $this->dataNascimento = strtotime($dataNascimento);
    }

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