<?php
require_once __DIR__ . '/../../controller/SessionController.php';
require_once __DIR__ . '/../../model/UsuarioModel.php';
require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';

if (!SessionController::isLoggedIn()) {
    header('Location: ../usuario/login.php');
    exit;
}

$usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->buscarPorId(SessionController::getIdUsuario());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? null;

    $usuarioModel->atualizar(SessionController::getIdUsuario(), $nome, $email, $senha);
    $_SESSION['nome'] = $nome;
    header('Location: perfil.php?sucesso=1');
    exit;
}
?>
<style>
    body{
        padding-top:100px
    }
</style>
<div class="container mt-5">
    <h2>Editar Perfil</h2>
    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success">Perfil atualizado com sucesso!</div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nova Senha (deixe em branco para não alterar):</label>
            <input type="password" name="senha" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

<?php require_once __DIR__ . '/../../public/partials/footer.php'; ?>
