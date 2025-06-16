<?php
require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../model/UsuarioModel.php';
require_once __DIR__ . '/../../controller/SessionController.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarioModel = new UsuarioModel();
    $usuario = $usuarioModel->buscarPorEmail($email);

    if ($usuario && $usuario['senha'] === $senha) {
        SessionController::login($usuario['id_usuario'], $usuario['nome'], $usuario['tipo']);
        header('Location: ../../public/index.php');
        exit;
    } else {
        $erro = "Email ou senha inválidos!";
    }
}
?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-card-header">
            Acesso à Biblioteca
        </div>
        <div class="auth-card-body">
            <?php if ($erro): ?>
                <div class="alert alert-danger auth-alert">
                    <?php echo $erro; ?>
                </div>
            <?php endif; ?>
            
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="email" class="auth-form-label">E-mail:</label>
                    <input type="email" class="form-control auth-form-control" id="email" name="email" required>
                </div>
                
                <div class="mb-4">
                    <label for="senha" class="auth-form-label">Senha:</label>    
                    <input type="password" class="form-control auth-form-control" id="senha" name="senha" required>
                </div>
                
                <button type="submit" class="btn auth-btn-primary">Entrar</button>
                <a href="new.php" class="btn auth-btn-secondary mt-3">Não Possui Conta? Cadastre-se</a>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../public/partials/footer.php'; ?>
