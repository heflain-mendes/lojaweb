<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/desweb/lojaweb/classes/cliente.php');
?>

<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
  <a href="/desweb/lojaweb/index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    <img src="/desweb/lojaweb/restrito/imagens/logo2.png">&nbsp;&nbsp;
    <h4> Loja Web</h4>
  </a>
  
  <div class="d-flex justify-content-end">
  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

    <li><a href="/desweb/lojaweb/index.php" class="nav-link px-2 link-secondary">Home</a></li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Produtos
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/desweb/lojaweb/controlers/controllerFabricante.php?opcao=2">Cadastrar</a></li>
        <li><a class="dropdown-item" href="#">Cadastrar Vários</a></li>
        <li><a class="dropdown-item" href="/desweb/lojaweb/controlers/controllerProduto.php?opcao=2">Consultar</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="/desweb/lojaweb/controlers/controllerProduto.php?opcao=6">Show Room</a></li>
      </ul>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Fabricantes
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/desweb/lojaweb/restrito/formFabricante.php">Cadastrar</a></li>
        <li><a class="dropdown-item" href="/desweb/lojaweb/controlers/controllerFabricante.php?opcao=1">Consultar</a></li>
      </ul>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Clientes
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Cadastrar</a></li>
        <li><a class="dropdown-item" href="/desweb/lojaweb/restrito/formClienteAtualizar.php">Consultar</a></li>
      </ul>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Vendas
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Vendas realizadas</a></li>
      </ul>
    </li>
    <li><a href="#" class="nav-link px-2 link-dark">Contato</a></li>

    <li>
      <a class="nav-link px-2 link-dark" href="/desweb/lojaweb/controlers/controllerCarrinho.php?opcao=4">
        <img src="/desweb/lojaweb/restrito/imagens/cart3.png" alt="">
      </a>
    </li>

  </ul>

  <div class="col-md-3 text-end">
    <?php
    if (!isset($_SESSION["cliente"])) {
    ?>
      <a class="btn btn-outline-primary me-2" role="button" href="/desweb/lojaweb/formLogin.php">Login</a>
    <?php
    } else {
      include_once($_SERVER['DOCUMENT_ROOT'] . '/desweb/lojaweb/restrito/includes/modal.inc.php');
    }
    ?>
  </div>
  </div>
</header>