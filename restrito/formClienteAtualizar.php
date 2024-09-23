<?php 
require_once "includes/cabecalho.inc.php";
require_once "../utils/funcoesUteis.php";

$cliente = $_SESSION["cliente"];

?>

<!-- CONTEUDO -->
<h1 class="text-center">Cadastro de Usuário</h1>

<div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Entre com suas informações de Cadastro</h5>
                <form action="../controlers/controlerCliente.php" method="get">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" minlength="3" maxlength="50" id="floatingInputNome" 
                        placeholder="José" name="nome" required value="<?=$cliente->nome?>">
                        <label for="floatingInputNome">Nome</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInputEmail" value="<?=$cliente->email?>"
                        minlength="8" maxlength="50" placeholder="nome@exemplo.com" name="email" required>
                        <label for="floatingInputEmail">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCidade" 
                        value="<?=$cliente->cidade?>" placeholder="Alegre" name="cidade" required>
                        <label for="floatingInputCidade">Cidade</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputLogradouro" 
                        value="<?=$cliente->logradouro?>" placeholder="Alegre" name="logradouro" required>
                        <label for="floatingInputLogradouro">Logradouro</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCEP"
                        value="<?=$cliente->cep?>" placeholder="Alegre" name="cep" required>
                        <label for="floatingInputCEP">CEP</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputEstado" value="<?=$cliente->estado?>"
                            minlength="2" maxlength="2" placeholder="Alegre" name="estado" required>
                        <label for="floatingInputEstado">Sigla Estado</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputTel"
                        value="<?=$cliente->telefone?>" placeholder="XX XXXXX-XXXX" name="telefone" required>
                        <label for="floatingInputTel">Telefone</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCPF"
                        value="<?=$cliente->cpf?>" placeholder="XXX.XXX.XXX-XX" name="cpf" required>
                        <label for="floatingInputCPF">CPF</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputrg"
                        value="<?=$cliente->rg?>" placeholder="XXX.XXX.XXX-XX" name="rg" required>
                        <label for="floatingInputrg">RG</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="floatingInputDtNasc" 
                        value="<?=parseISO($cliente->dataNascimento)?>" name="dataNascimento" required>
                        <label for="floatingInputDtNasc">Data Nascimento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" minlength="4"
                            maxlength="8" placeholder="Senha" name="senha" required>
                        <label for="floatingPassword">Senha</label>
                    </div>

                    <hr>

                    <div class="d-grid mb-2">
                        <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Atualizar</button>
                    </div>

                    <div class='d-grid mb-2'>
                        <a href='../controlers/controlerCliente.php?pOpcao=5&cpf=<?=$cliente->cpf?>' 
                        class='btn btn-lg btn-danger btn-login fw-bold text-uppercase'>Remover conta</a>
                    </div>

                    <input type="hidden" value="4" name="pOpcao">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="includes/scripts/validacoesFormUsuario.js"></script>

<!-- Rodape -->

<?php require_once "includes/rodape.inc.php" ?>