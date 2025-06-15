<?php
$isHome = true;
require_once __DIR__ . '/../public/partials/header.php';
require_once __DIR__ . '/../public/partials/navbar.php';
?>
<link rel="stylesheet" href="/CRUD-DW2-2SEM/public/partials/css/navbar.css">



<!-- Carrossel em tela cheia -->
<div id="fullscreenCarousel" class="carousel slide vh-100" data-bs-ride="carousel" style="position: relative;">
  <div class="carousel-inner h-100">
    <div class="carousel-item active h-100">
      <img src="/CRUD-DW2-2SEM/public/uploads/banner3.png" class="d-block w-100 h-100" style="object-fit: cover;" alt="Banner principal da biblioteca">
      <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="top: 0;">
        <h1 class="display-3 fw-bold mb-4">Biblioteca Acervo Dourado</h1>
        <p class="lead d-none d-md-block">Role para baixo para explorar nosso acervo</p>
        <div class="scroll-indicator mt-5">
          <i class="bi bi-chevron-double-down fs-1 animate-bounce"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Container dos cards -->
<div id="bookCards" class="container-fluid py-5 bg-light" style="min-height: 100vh; opacity: 0; transform: translateY(50px); transition: all 1s ease;">
  <div class="container">
    <?php
    require_once __DIR__ . '/../model/CategoriaModel.php';
    require_once __DIR__ . '/../model/LivroModel.php';

    $categoriaModel = new CategoriaModel();
    $livroModel = new LivroModel();

    $categorias = $categoriaModel->listarTodos();

    foreach ($categorias as $categoria):
      $livros = $livroModel->buscarPorCategoria($categoria['id_categoria']);
      if (count($livros) > 0):
    ?>
      <h2 class="section-title">📖 <?= htmlspecialchars($categoria['nome_categoria']) ?></h2>
      <div class="row g-4 mb-5">
        <?php foreach ($livros as $livro): ?>
          <div class="col-md-3">
            <div class="card h-100">
              <!-- Imagem do livro -->
              <?php if (!empty($livro['imagem'])): ?>
                <img src="/CRUD-DW2-2SEM/public/uploads/<?= htmlspecialchars($livro['imagem']) ?>" class="card-img-top" alt="Capa do livro <?= htmlspecialchars($livro['titulo']) ?>">
              <?php else: ?>
                <img src="/CRUD-DW2-2SEM/public/uploads/default.png" class="card-img-top" alt="Capa padrão para livro sem imagem">
              <?php endif; ?>

              <div class="card-body">
                <h5 class="card-title">📘 <?= htmlspecialchars($livro['titulo']) ?></h5>
                <p class="card-text"><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
                <p class="card-text text-muted">Status: <?= htmlspecialchars($livro['status']) ?></p>

                <button class="btn btn-outline-primary btn-sm btn-sinopse" 
                        data-livro-id="<?= $livro['id_livro'] ?>"
                        data-livro-titulo="<?= htmlspecialchars($livro['titulo']) ?>">
                  Sinopse
                </button>

                <?php if ($livro['status'] === 'reservado'): ?>
                  <button class="btn btn-secondary btn-sm mt-2" disabled>
                    Reservado
                  </button>
                <?php else: ?>
                  <button class="btn btn-outline-success btn-sm btn-reservar mt-2"
                          data-livro-id="<?= $livro['id_livro'] ?>"
                          data-livro-titulo="<?= htmlspecialchars($livro['titulo']) ?>">
                    Reservar
                  </button>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; // livros ?>
      </div>
    <?php endif; // if livros ?>
  <?php endforeach; // categorias ?>
  </div>
</div> <!-- fecha #bookCards -->
    
    <div class="modal fade" id="sinopseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-dark text-white">
            <h5 class="modal-title" id="sinopseModalTitle">Sinopse</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="sinopseModalBody">
            <div class="text-center my-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
            <p class="mt-2">Carregando sinopse...</p>
            </div>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal de Confirmação de Reserva -->
<div class="modal fade" id="reservaModal" tabindex="-1" aria-labelledby="reservaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="formReserva">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="reservaModalLabel">Confirmar Reserva</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p id="reservaModalTexto">Você deseja realmente reservar este livro?</p>
          <input type="hidden" name="id_livro" id="idLivroReserva">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Confirmar Reserva</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../public/partials/footer.php'; ?>


