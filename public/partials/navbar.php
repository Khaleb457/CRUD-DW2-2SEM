<?php require_once __DIR__ . '/../../config/db.php'; ?>
<?php require_once __DIR__ . '/../../controller/SessionController.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavbar">
  <div class="container">
    <a class="navbar-brand" href="<?= BASE_URL ?>/public/index.php">Acervo Dourado</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <?php if (SessionController::isLoggedIn()): ?>
          <?php if ($_SESSION['tipo'] === 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>/views/livro/index.php">Livros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>/views/categoria/index.php">Categorias</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>/public">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>/views/usuario/perfil.php">Meu Perfil</a>
            </li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav ms-auto">
        <?php if (SessionController::isLoggedIn()): ?>
          <li class="nav-item dropdown me-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPerfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle me-1"></i> <?php echo htmlspecialchars(ucfirst($_SESSION['nome'])); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPerfil">
              <li><a class="dropdown-item" href="<?= BASE_URL ?>/views/usuario/perfil.php">Perfil</a></li>
              <li><a class="dropdown-item" href="<?= BASE_URL ?>/views/usuario/reservas.php">Minhas Reservas</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <form action="<?= BASE_URL ?>/public/logout.php" method="post">
              <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="<?= BASE_URL ?>/views/usuario/login.php">Login</a>         
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
