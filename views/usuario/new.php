<?php
require_once __DIR__ . '/../../public/partials/header.php';
?>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Cadastro de Usuário</h4>
        </div>
        <div class="card-body">
            <form action="../../controller/UsuarioController.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                <a href="../../public/index.php" class="btn btn-secondary btn-sm mt-3">Voltar</a>

            </form>
        </div>
    </div>

<?php require_once __DIR__ . '/../../public/partials/footer.php'; ?>
