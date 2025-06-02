<?php
require_once "../../model/CategoriaModel.php";

$categoria = new CategoriaModel;
$listar = $categoria->buscarPorId($_GET['id_categoria']);

if (isset($_GET['id_categoria'])) {
    $categoria = new CategoriaModel;
    $listar = $categoria->buscarPorId($_GET['id_categoria']);
} else {
    echo "ID da categoria não informado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Categoria</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Editar Categoria</h2>

    <form action="../../controller/CategoriaController.php" method="POST">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome da Categoria</label>
        <input 
          type="text" 
          class="form-control" 
          id="nome" 
          name="nome" 
          value="<?= htmlspecialchars($listar['nome_categoria']) ?>" 
          required
        >
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $listar['id_categoria'] ?>">
      </div>
      <button type="submit" class="btn btn-primary">Atualizar</button>
      <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

  <!-- Bootstrap JS (opcional, apenas se for usar funcionalidades JS do Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
