<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Cadastrar Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h1>Cadastrar Categoria</h1>

    <form method="POST" action="../../controller/CategoriaController.php">
        <div class="mb-3">
            <label for="nome_categoria" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
</body>
</html>