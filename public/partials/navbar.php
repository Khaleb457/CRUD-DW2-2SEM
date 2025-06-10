<?php require_once __DIR__ . '/../../config/db.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASE_URL ?>/public">Biblioteca</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>/views/livro/index.php">Livros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>/views/categoria/index.php">Categorias</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="btn btn-outline-light" href="<?= BASE_URL ?>/views/usuario/login.php">Login</a>         
        </li>
      </ul>
    </div>
  </div>
</nav>
