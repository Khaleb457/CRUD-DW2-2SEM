<?php
require_once __DIR__ . '/../../model/LivroModel.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';

$livroModel = new LivroModel();
$categoriaModel = new CategoriaModel();

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$livro = $livroModel->buscarPorId($id);
$categorias = $categoriaModel->listarTodos();
$categoriasSelecionadas = $livroModel->buscarCategoriasPorLivro($id); // array com IDs

require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';

?>

<style>
    body {
  padding-top: 56px;
}
</style>

<div class="container mt-5 mb-5">
    
    <h2>Editar Livro</h2>

    <form action="../../controller/livroController.php" method="POST" enctype="multipart/form-data">>
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= htmlspecialchars($livro['id_livro']) ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required
                   value="<?= htmlspecialchars($livro['titulo']) ?>">
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" required
                   value="<?= htmlspecialchars($livro['autor']) ?>">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" rows="4" class="form-control"><?= htmlspecialchars($livro['descricao']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="disponivel" <?= $livro['status'] === 'disponivel' ? 'selected' : '' ?>>Disponível</option>
                <option value="alugado" <?= $livro['status'] === 'alugado' ? 'selected' : '' ?>>Alugado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem do Livro</label>
            <input type="file" name="imagem" id="imagem" class="form-control">

            <?php if (!empty($livro['imagem'])): ?>
                <p class="mt-2">Imagem atual:</p>
                <img src="../../uploads/<?= htmlspecialchars($livro['imagem']) ?>" alt="Imagem atual" class="img-thumbnail" style="max-height: 150px;">
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Categorias</label>
            <div class="form-check">
                <?php foreach ($categorias as $categoria): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="categorias[]"
                               value="<?= $categoria['id_categoria'] ?>"
                               <?= in_array($categoria['id_categoria'], $categoriasSelecionadas) ? 'checked' : '' ?>>
                        <label class="form-check-label">
                            <?= htmlspecialchars($categoria['nome_categoria']) ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php require_once __DIR__ . '/../../public/partials/footer.php' ?>
