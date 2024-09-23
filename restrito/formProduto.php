<?php
    require_once "includes/cabecalho.inc.php";  
    
    if(isset($_SESSION["fabricantes"])){
      $fabricantes = $_SESSION["fabricantes"];
    }else{
      header("Location: ../index.php");
    }
?>
<p>
<h1 class="text-center">Inclusão de produto</h1>
<p> 
  
<form class="row g-3" action="../controlers/controllerProduto.php" method="post" enctype="multipart/form-data">
  <div class="col-md-3">
    <label for="pReferencia" class="form-label">Nº Referencia</label>
    <input type="text" class="form-control" name="pReferencia">
  </div>
  <div class="col-md-6">
    <label for="pNome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="pNome">
  </div>
  <div class="col-md-3">
    <label for="pPreco" class="form-label">Preço</label>
    <input type="text" class="form-control" name="pPreco">
  </div>
  <div class="col-md-3">
    <label for="pDataFabricacao" class="form-label">Data de fabricação</label>
    <input type="date" class="form-control" name="pDataFabricacao">
  </div>
  <div class="col-md-3">
    <label for="pFabricante" class="form-label">Fabricante</label>
    <select name="pFabricante" class="form-select">
    <option selected value="0">Escolha...</option>
      <?php
      foreach ($fabricantes as $f) {
        echo "<option value=$f->codigo>$f->nome</option>";
      }
      ?>
      
    </select>
  </div>
  <div class="col-md-2">
    <label for="pEstoque" class="form-label">Qde Estoque</label>
    <input type="text" class="form-control" name="pEstoque">
  </div>
  <div class="col-md-4">
    <label for="imagem" class="form-label">Foto:</label>
    <input type="file" class="form-control" name="imagem">
  </div>
  <div class="col-12">
    <label for="pDescricao" class="form-label">Descrição do produto: </label>
    <textarea class="form-control" name="pDescricao" rows="6" style="resize: none"></textarea>    
  </div>
  <div class="col-12">
    <label for="pResumo" class="form-label">Resumo do produto: </label>
    <textarea class="form-control" name="pResumo" rows="3" style="resize: none"></textarea>    
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Incluir</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
  </div>
  <input type="hidden" name="opcao" value="1">
</form>

<?php
       require_once 'includes/rodape.inc.php';
?>
