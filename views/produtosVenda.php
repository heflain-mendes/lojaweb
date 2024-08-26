<?php
include_once '../classes/produto.inc.php';
include_once 'includes/cabecalho.inc.php';

$produtos = $produtoDAO->getProdutos();
?>
<h1 class="text-center">Show room de produtos</h1>
<p>

<div class="row row-cols-1 row-cols-md-5 g-4">

  <?php
  foreach ($produtos as $p) {
  ?>

  <div class="col">
    <div class="card">
      <img src="imagens/produtos/<?=$p->getReferencia()?>.jpg" class="card-img-top" alt="<?=$p->getDescricao()?>">
      <div class="card-body">
        <h5 class="card-title"><?=$p->getNome()?></h5>
        <p class="card-text"><?=$p->getResumo()?></p>
        <h6 class="card-text text-end">Marca: <?=$p->getNomeFabricante()?></h6>
        <h4 class="card-title">R$ <?=number_format($p->getPreco(), 2, ',')?></h4>
        <div class="text-end"><?php echo "<a href='#' class='btn btn-danger'>Comprar</a>" ?></div>
      </div>
    </div>
  </div>

  <?php
  }
  ?>
</div>

<?php require_once "includes/rodape.inc.php" ?>