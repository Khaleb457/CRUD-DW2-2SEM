<?php
require_once '../../model/CategoriaModel.php';

$db = new Database();
$pdo = $db->getConnection();

$categorias = new CategoriaModel();
$listar = $categorias->listarTodos();

require_once __DIR__ . '/../../public/partials/header.php'
require_once __DIR__ . '/../../public/partials/navbar.php';

?>

<div class="container mt-5">
    <h1>Cadastrar Livro</h1>

    <form method="POST" action="../../controller/LivroController.php">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" id="autor" name="autor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Categorias</label>
            <div>
                <?php foreach ($listar as $listars): ?>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="categoria<?= $listars['id_categoria'] ?>"
                            name="categorias[]"
                            value="<?= $listars['id_categoria'] ?>"
                        >
                        <label class="form-check-label" for="categoria<?= $listars['id_categoria'] ?>">
                            <?= htmlspecialchars($listars['nome_categoria']) ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <input type="hidden" name="acao" value="inserir">
        <button type="submit" class="btn btn-primary">Cadastrar Livro</button>
    </form>
</div>

<?php require_once __DIR__ . '/../../public/partials/footer.php' ?>
