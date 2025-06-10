<?php
require_once __DIR__ . '/../../model/LivroModel.php'; 
$livroModel = new LivroModel();
$livros = $livroModel->listarTodos();
$livros = $livroModel->listarComCategorias();

require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';

?>
<div class="container mt-5">
    <h1 class="mb-4">Gerenciamento de Livros</h1>

    <a href="new.php" class="btn btn-primary mb-3">Cadastrar Novo Livro</a>

    <?php if (count($livros) > 0): ?>
        <table class="table table-hover table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Categorias</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?= htmlspecialchars($livro['id_livro']) ?></td>
                        <td><?= htmlspecialchars($livro['titulo']) ?></td>
                        <td><?= htmlspecialchars($livro['autor']) ?></td>
                        <td><?= htmlspecialchars($livro['descricao']) ?></td>
                        <td><?= htmlspecialchars($livro['status']) ?></td>
                        <td><?= htmlspecialchars($livro['categorias']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $livro['id_livro'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="../../controller/livroController.php?acao=excluir&id=<?= $livro['id_livro'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Nenhum livro cadastrado.</div>
    <?php endif; ?>
</div>
<?php require_once __DIR__ . '/../../public/partials/footer.php' ?>
