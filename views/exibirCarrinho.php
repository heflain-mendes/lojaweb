<?php
require_once '../classes/item.inc.php';
require_once '../classes/produto.inc.php';
require_once 'includes/cabecalho.inc.php';

$carrinho = [];
if(isset($_SESSION["carrinho"])){
$carrinho = $_SESSION["carrinho"];
}
?>

<h1 class="text-center">Carrinho de compra</h1>
<p>
    <?php
    if (isset($_REQUEST['status'])) {
        include_once 'includes/carrinhoVazio.inc.php';
    } else {
    ?>
<div class="table-responsive">
    <table class="table table-ligth table-striped">
        <thead class="table-danger">
            <tr class="align-middle" style="text-align: center">
                <th witdh="10%">Item No</th>
                <th>Ref.</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Preço</th>
                <th>Qde.</th>
                <th>Total</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $contador = 0;
            $soma = 0;
            foreach ($carrinho as $item) {
                $contador++;
                $soma += $item->getValorItem();
            ?>
                <tr class="align-middle" style="text-align: center">
                    <td><?= $contador ?></td>
                    <td><?= $item->getProduto()->getProdutoId() ?></td>
                    <td><?= $item->getProduto()->getNome() ?></td>
                    <td><?= $item->getProduto()->getNomeFabricante() ?></td>
                    <td>R$ <?= number_format($item->getProduto()->getPreco(), 2, ',', '.') ?></td>
                    <td>
                        <form action="../controlers/controllerCarrinho.php" class="d-flex" method="post">
                            <input type="hidden" name="opcao" value="6">
                            <input type="hidden" name="id" value="<?= $item->getProduto()->getProdutoId() ?>">
                            <input type="number" class="form-control" style="max-width: 80px;" 
                            name="qtd" value="<?= $item->getQtd() ?>" min="1" max="<?=$item->getProduto()->getEstoque()?>">
                        </form>
                    </td>
                    <td>R$ <?= number_format($item->getValorItem(), 2, ',', '.') ?></td>
                    <td><a href="../controlers/controllerCarrinho.php?opcao=2&index=<?= $contador - 1 ?>" class='btn btn-danger btn-sm'>X</a></td>
                </tr>
            <?php
            }
            ?>

            <tr align="right">
                <td colspan="8">
                    <font face="Verdana" size="4" color="red"><b>Valor Total = R$ <?= number_format($soma, 2, ',', '.') ?></b></font>
                </td>
            </tr>
    </table>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <a class="btn btn-warning" role="button" href="../controlers/controllerProduto.php?opcao=6"><b>Continuar comprando</b></a>
            </div>
            <div class="col">
                <a class="btn btn-danger" role="button" href="../controlers/controllerCarrinho.php?opcao=3"><b>Esvaziar carrinho</b></a>
            </div>
            <div class="col">
                <a class="btn btn-success" role="button" href="../controlers/controllerCarrinho.php?opcao=5"><b>Finalizar compra</b></a>
            </div>
        </div>
    </div>

<?php
    $_SESSION["total"] = $soma;
    }
    require_once 'includes/rodape.inc.php';
?>