<?php        
      require_once "../classes/produto.inc.php";
      require_once "../utils/funcoesUteis.php";
      require_once "includes/cabecalho.inc.php";
      
      $produtos = [];
      
      if(isset($_SESSION["produtos"])){
            $produtos = $_SESSION["produtos"];
      }else{
            header("Location: ../controlers/controllerProduto.php?opcao=2");
      }
?>
<p>
<h1 class="text-center">Produtos do estoque</h1>
<p> 
<div class="table-responsive">
<table class="table table-light table-hover">
      <thead class="table-primary">
            <tr class="align-middle" style="text-align: center">
                <th witdh="10%">ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data de Fabricação</th>
                <th>Preço unitário<br>(R$)</th>
                <th>Em Estoque</th>
                <th>Fabricante</th>
                <th>Operação</th>
            </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
            foreach ($produtos as $item) {
               echo "<tr align='center'>";
               echo "<td>". $item->getProdutoId() ."</td>";
               echo "<td><strong>". $item->getNome() ."</strong></td>";
               echo "<td>". $item->getResumo() ."</td>";
               echo "<td>". formatarData($item->getDataFabricacao()) ."</td>";
               echo "<td>". number_format($item->getPreco(), 2, ",") ."</td>";
               echo "<td>". $item->getEstoque() ."</td>";
               echo "<td>". $item->getNomeFabricante() ."</td>";
               echo "<td><a href='../controlers/controllerProduto.php?opcao=4&id=".$item->getProdutoId()."' class='btn btn-success btn-sm'>A</a> ";
               echo "<a href='../controlers/controllerProduto.php?opcao=3&id=".$item->getProdutoId()."' class='btn btn-danger btn-sm'>X</a></td>";
               echo "</tr>";
            }
      ?>
      </tbody>  
</table>
</div>

<?php
       require_once 'includes/rodape.inc.php';
?>

