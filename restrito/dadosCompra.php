<?php 
      require_once "../classes/produto.inc.php";
      require_once "../classes/item.inc.php";
      require_once "includes/cabecalho.inc.php";
      
      $cliente = $_SESSION["cliente"];
      $carrinho = $_SESSION["carrinho"];
      $total = $_SESSION["total"];
 ?>

<h1 class="text-center">Dados do cliente</h1>

<p>&nbsp;
<div style="font-size: 1.25rem;">
      <p><b>Nome:</b> <?=$cliente["nome"]?>
      <p><b>CPF:</b> <?=$cliente["cpf"]?>
      <p><b>Endereço Completo:</b> <?=$cliente["logradouro"] . " " . $cliente["cidade"]."-".$cliente["estado"]?>
      <p><b>Telefone:</b> <?=$cliente["telefone"]?>
      <p><b>Email:</b> <?=$cliente["email"]?>
      </font>
      <p><hr><p>&nbsp;
</div>

<h1 class="text-center">Dados da compra</h1>
<p>

<div class="table-responsive">
<table class="table">
      <thead class="table-success">
            <tr class="align-middle" style="text-align: center">
                <th witdh="10%">Item</th>
                <th>Referencia</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Preço</th>
                <th>Qde.</th>
                <th>Valor</th>                
            </tr>
      </thead>
      <tbody class="table-group-divider">
<?php
          foreach ($carrinho as $c) {

?>
            <tr class="align-middle" style="text-align: center">
                  <td><img src="imagens/produtos/<?=$c->produto->getReferencia()?>.jpg" width="100" height="100" border="0"></td>
                  <td><?=$c->produto->getReferencia()?></td>
                  <td><?=$c->produto->getNome()?></td>
                  <td><?=$c->produto->getNomeFabricante()?></td>
                  <td>R$ <?=$c->produto->getPreco()?></td>
                  <td><?=$c->qtd?></td>
                  <td>R$ <?=$c->valorItem?></td>
            </tr>
          <?php } ?>
            
          <tr align="right"><td colspan="7"><font face="Verdana" size="4" color="red"><b>Valor Total = R$ <?=$total?></b></font></td></tr>
          </table>
          <div class="container text-center">
            <div class="row">
                  <div class="col">
                        <a class="btn btn-success" role="button" href="dadosPagamento.php"><b>Efetuar o pagamento</b></a>
                  </div>                 
            </div>
         </div>

<!-- Rodape -->

<?php require_once "includes/rodape.inc.php" ?>
