<?php
require_once __DIR__ . '/../../public/partials/header.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-card-header">
            Cadastro de Usuário
        </div>
        <div class="auth-card-body">
            <form action="../../controller/UsuarioController.php" method="POST">
                <div class="mb-4">
                    <label for="nome" class="auth-form-label">Nome:</label>
                    <input type="text" class="form-control auth-form-control" id="nome" name="nome" required>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="auth-form-label">E-mail:</label>
                    <input type="email" class="form-control auth-form-control" id="email" name="email" required>
                </div>
                
                <div class="mb-4">
                    <label for="senha" class="auth-form-label">Senha:</label>
                    <input type="password" class="form-control auth-form-control" id="senha" name="senha" required>
                </div>
                
                <button type="submit" class="btn auth-btn-primary">Cadastrar</button>
                <a href="../../public/index.php" class="btn auth-btn-secondary mt-3">Voltar</a>
            </form>
        </div>
    </div>

<?php require_once __DIR__ . '/../../public/partials/footer.php'; ?>