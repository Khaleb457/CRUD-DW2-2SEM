<?php
require_once "../../model/CategoriaModel.php";

$categoria = new CategoriaModel;
$listar = $categoria->listarTodos();

require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';

?>

<style>
body {
  padding-top: 100px;
} 
</style>

    <div class="container mt-4">
      <h2>Lista de Categorias</h2>
      <a href="new.php" class="btn btn-primary mb-3 mt-3 px-4 py-2">Cadastrar Nova Categoria</a>

      <table class="table table-hover table-custom fs-5 text-center">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($listar as $listars): ?>
            <tr>
              <td><?= htmlspecialchars($listars['id_categoria']) ?></td>
              <td><?= htmlspecialchars(ucfirst(strtolower($listars['nome_categoria']))) ?></td>
              <td>
                <a href="edit.php?id_categoria=<?= $listars['id_categoria'] ?>" class="btn  btn-primary px-4 py-2">Editar</a>
                <a href="../../controller/CategoriaController.php?acao=excluir&id=<?= $listars['id_categoria'] ?>" class="btn  btn-danger px-4 py-2" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  
<?php require_once __DIR__ . '/../../public/partials/footer.php' ?>

