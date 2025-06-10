<?php
require_once __DIR__ . '/../public/partials/header.php';
require_once __DIR__ . '/../public/partials/navbar.php';
?>

    <!-- Carousel -->
    <!-- <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1200x400/?library,books" class="d-block w-100" alt="Biblioteca">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Descubra novos mundos em cada página</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x400/?reading,bookstore" class="d-block w-100" alt="Livros">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Explore nossa coleção de livros digitais</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div> -->

    <div class="container mt-5">
        <!-- Simulação de categorias e livros -->
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
                        <img src="<?= htmlspecialchars($livro['imagem']) ?>" class="card-img-top" alt="Capa do livro <?= htmlspecialchars($livro['titulo']) ?>" style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <!-- Imagem padrão caso não tenha -->
                        <img src="/public/images/default-book.png" class="card-img-top" alt="Imagem padrão" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">📘 <?= htmlspecialchars($livro['titulo']) ?></h5>
                        <p class="card-text"><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
                        <p class="card-text text-muted">Status: <?= htmlspecialchars($livro['status']) ?></p>
                        <a href="/views/livro/show.php?id=<?= $livro['id_livro'] ?>" class="btn btn-outline-primary btn-sm">Ver detalhes</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; endforeach; ?>
    </div>

<?php require_once __DIR__ . '/../public/partials/footer.php'; ?>