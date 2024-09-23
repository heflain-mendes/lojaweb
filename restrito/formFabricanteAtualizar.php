<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/desweb/lojaweb/restrito/includes/cabecalho.inc.php');
    
    $fabricante = $_SESSION["fabricante"];
?>

<!-- CONTEUDO -->
<h1 class="text-center">Atualizar Fabricante</h1>

<div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Entre com suas informações de Cadastro</h5>
                <form action="/desweb/lojaweb/controlers/controllerFabricante.php" method="get">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInputCodigo"
                            value="<?=$fabricante->codigo?>" placeholder="XXXX" name="codigo" disabled>
                        <label for="floatingInputCodigo">Código</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" minlength="3" maxlength="50" id="floatingInputNome"
                            value="<?=$fabricante->nome?>" placeholder="José" name="nome" required>
                        <label for="floatingInputNome">Nome</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInputEmail" minlength="8" maxlength="50"
                            value="<?=$fabricante->email?>" placeholder="nome@exemplo.com" name="email" required>
                        <label for="floatingInputEmail">Email</label>
                    </div>

                    

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputLogradouro" 
                            value="<?=$fabricante->logradouro?>" placeholder="Alegre" name="logradouro" required>
                        <label for="floatingInputLogradouro">Logradouro</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCEP" placeholder="Alegre"
                            value="<?=$fabricante->cep?>" name="cep" required>
                        <label for="floatingInputCEP">CEP</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCidade" placeholder="Alegre"
                            value="<?=$fabricante->cidade?>" name="cidade" required>
                        <label for="floatingInputCidade">Cidade</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputRamo"
                            value="<?=$fabricante->ramo?>" placeholder="Ramo de atuação" name="ramo" required>
                        <label for="floatingInputRamo">Ramo</label>
                    </div>

                    <hr>

                    <div class="d-grid mb-2">
                        <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Atualizar</button>
                    </div>

                    <input type="hidden" value="6" name="opcao">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/desweb/lojaweb/restrito/includes/scripts/validacoesFormUsuario.js"></script>

<!-- Rodape -->

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/desweb/lojaweb/restrito/includes/rodape.inc.php') ?>