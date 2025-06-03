<?php
require_once __DIR__ . '/../../public/partials/header.php';
?>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Login</h4>
        </div>
        <div class="card-body">
            <form action="../../controller/LoginController.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                <a href="new.php" class="btn btn-warning w-100 mt-3">Não Possui Conta Cadastre-se</a>
            </form>
        </div>
    </div>

<?php require_once __DIR__ . '/../../public/partials/footer.php'; ?>
