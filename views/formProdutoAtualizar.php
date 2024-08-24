<?php
  require_once "../classes/produto.inc.php";
  require_once "../utils/funcoesUteis.php";
  require_once 'includes/cabecalho.inc.php';

  $produto = null;

  if(isset($_SESSION["produto"])){
        $produto = $_SESSION["produto"];
  }else{
        header("Location: ../controlers/controllerProduto.php?opcao=2");
  }
  
  $fabricantes = $_SESSION["fabricantes"];
?>
<p>
<h1 class="text-center">Alteração de produto</h1>
<p> 

<form class="row g-3" action="../controlers/controllerProduto.php?opcao=5" method="post">

<div class="col-md-2">
    <label for="pId" class="form-label">ID</label>
    <input type="text" class="form-control" name="pId" value="<?=$produto->getProdutoId()?>" readonly>
  </div>  
<div class="col-md-3">
    <label for="pReferencia" class="form-label">Nº Referencia</label>
    <input type="text" class="form-control" name="pReferencia" value="<?=$produto->getReferencia()?>" readonly>
  </div>
  <div class="col-md-7">
    <label for="pNome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="pNome" value="<?=$produto->getNome()?>">
  </div>
  <div class="col-md-3">
    <label for="pPreco" class="form-label">Preço</label>
    <input type="text" class="form-control" name="pPreco" value="<?=$produto->getPreco()?>">
  </div>
  <div class="col-md-3">
    <label for="pDataFabricacao" class="form-label">Data de fabricação</label>
    <input type="date" class="form-control" name="pDataFabricacao" value="<?=date("Y-m-d", $produto->getDataFabricacao())?>">
  </div>
  <div class="col-md-4">
    <label for="pFabricante" class="form-label">Fabricante</label>
    <select name="pFabricante" class="form-select">
      <?php
        foreach ($fabricantes as $f) {
          if($f->codigo == $produto->getCodFabricante()){
            echo "<option selected value=$f->codigo>$f->nome</option>";
          }else{
            echo "<option value=$f->codigo>$f->nome</option>";
          }
        }                   
      ?>
    </select>
  </div>
  <div class="col-md-2">
    <label for="pEstoque" class="form-label">Qde Estoque</label>
    <input type="text" class="form-control" name="pEstoque" value="<?=$produto->getEstoque()?>">
  </div>
  <div class="col-12">
    <label for="pDescricao" class="form-label">Descrição do produto: </label>
    <textarea class="form-control" name="pDescricao" rows="6" style="resize: none"><?=$produto->getDescricao()?></textarea>    
  </div>
  <div class="col-12">
    <label for="pResumo" class="form-label">Resumo do produto: </label>
    <textarea class="form-control" name="pResumo" rows="6" style="resize: none"><?=$produto->getResumo()?></textarea>    
  </div>
  <div class="col-12 text-center">
    <button type="submit" class="btn btn-success">Alterar</button>
  </div>
  <input type="hidden" name="opcao" value="5">
</form>

<?php
       require_once 'includes/rodape.inc.php';
?>