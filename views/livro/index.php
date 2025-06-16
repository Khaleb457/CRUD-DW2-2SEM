<?php
require_once __DIR__ . '/../../model/LivroModel.php'; 
$livroModel = new LivroModel();
$livros = $livroModel->listarTodos();
$livros = $livroModel->listarComCategorias();

require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';

?>

<style>
body {
  padding-top: 56px;
}
</style>
<div class="container mt-5 mb-5">
    <h1 class="mb-4">Gerenciamento de Livros</h1>

    <a href="new.php" class="btn btn-primary mb-3 px-4 py-2">Cadastrar Novo Livro</a>

    <?php if (count($livros) > 0): ?>
        <table class="table table-hover table-custom fs-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Status</th>
                    <th>Categorias</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?= htmlspecialchars($livro['id_livro']) ?></td>
                        <td><?= htmlspecialchars(ucfirst(strtolower($livro['titulo']))) ?></td>
                        <td><?= htmlspecialchars(ucfirst(strtolower($livro['autor']))) ?></td>
                        <td><?= htmlspecialchars(ucfirst(strtolower($livro['status']))) ?></td>
                        <td><?= htmlspecialchars(ucfirst(strtolower($livro['categorias'])))?></td>
                        <td>
                            <?php if ($livro['status'] === 'reservado' && !empty($livro['nome_reserva'])): ?>
                                Reservado por: <strong><?= htmlspecialchars(ucfirst(strtolower($livro['nome_reserva']))) ?></strong>
                            <?php else: ?>
                                <?= htmlspecialchars(ucfirst(strtolower($livro['status']))) ?>
                            <?php endif; ?>
                        </td>
                        <td>
                        <div class="d-flex gap-2" role="group">
                            <a href="editar.php?id=<?= $livro['id_livro'] ?>" class="btn  btn-warning px-4 py-2">Editar</a>
                            <a href="excluir.php?id=<?= $livro['id_livro'] ?>" class="btn btn-danger px-4 py-2" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </div>
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
