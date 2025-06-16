<?php
require_once __DIR__ . '/../../controller/SessionController.php';
require_once __DIR__ . '/../../model/LivroModel.php';
require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';

if (!SessionController::isLoggedIn()) {
    header('Location: ../usuario/login.php');
    exit;
}

$livroModel = new LivroModel();
$livrosReservados = $livroModel->listarReservadosPorUsuario(SessionController::getIdUsuario());
?>

<style>
    body{
        padding-top:100px
    }
</style>

<div class="container mt-5">
    <h2>📚 Meus Livros Reservados</h2>

    <?php if (count($livrosReservados) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Data da Reserva</th>
                        <th>Data de Devolução</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livrosReservados as $livro): ?>
                        <tr>
                            <td><?= htmlspecialchars($livro['titulo']) ?></td>
                            <td><?= htmlspecialchars($livro['autor']) ?></td>
                            <td><?= date('d/m/Y', strtotime($livro['data_reserva'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($livro['data_reserva'] . ' +7 days')) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">Nenhuma reserva encontrada.</div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../../public/partials/footer.php'; ?>
