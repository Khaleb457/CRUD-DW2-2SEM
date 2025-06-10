<?php
require_once "../../model/CategoriaModel.php";

$categoria = new CategoriaModel;
$listar = $categoria->listarTodos();

require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';

?>

    <div class="container mt-4">
      <h2>Lista de Categorias</h2>
      <table class="table table-hover table-custom">
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
              <td><?= htmlspecialchars($listars['nome_categoria']) ?></td>
              <td>
                <a href="edit.php?id_categoria=<?= $listars['id_categoria'] ?>" class="btn btn-sm btn-primary">Editar</a>
                <a href="../../controller/CategoriaController.php?acao=excluir&id=<?= $listars['id_categoria'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  
<?php require_once __DIR__ . '/../../public/partials/footer.php' ?>

