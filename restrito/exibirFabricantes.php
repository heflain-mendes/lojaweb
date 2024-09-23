<?php        
      require_once "../classes/produto.inc.php";
      require_once "../utils/funcoesUteis.php";
      require_once "includes/cabecalho.inc.php";
      
      $fabricantes = isset($_SESSION['fabricantes']) ? $_SESSION['fabricantes'] : array();
?>
<p>
<h1 class="text-center">Fabricantes</h1>
<p> 
<div class="table-responsive">
<table class="table table-light table-hover">
      <thead class="table-primary">
            <tr class="align-middle" style="text-align: center">
                  <th>Código</th>
                <th>Nome</th>
                <th>Endereco</th>
                <th>Email</th>
                <th>Ramo</th>
                <th>Operação</th>
            </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
            foreach ($fabricantes as $item) {
               echo "<tr align='center'>";
               echo "<td>". $item->codigo . "</td>";
               echo "<td> $item->nome </td>";
               echo "<td>". $item->logradouro . " - " . $item->cidade . " - " . $item->cep ."</td>";
               echo "<td>". $item->email ."</td>";
               echo "<td>". $item->ramo ."</td>";
               echo "<td><a href='../controlers/controllerFabricante.php?opcao=4&codigo=".$item->codigo."' class='btn btn-success btn-sm'>A</a> ";
               echo "<a href='../controlers/controllerFabricante.php?opcao=7&codigo=".$item->codigo."' class='btn btn-danger btn-sm'>X</a></td>";
               echo "</tr>";
            }
      ?>
      </tbody>  
</table>
</div>

<?php
       require_once 'includes/rodape.inc.php';
?>

