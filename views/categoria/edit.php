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

require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';


?>
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

<?php require_once __DIR__ . '/../../public/partials/footer.php' ?>

