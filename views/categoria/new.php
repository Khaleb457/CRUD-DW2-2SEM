<?php 
require_once __DIR__ . '/../../public/partials/header.php';
require_once __DIR__ . '/../../public/partials/navbar.php';

?>

<style>
body {
  padding-top: 100px;
} 
</style>


<div class="container mt-5">
    <h1>Cadastrar Categoria</h1>

    <form method="POST" action="../../controller/CategoriaController.php">
        <div class="mb-3">
            <label for="nome_categoria" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" required>
            <input type="hidden" name="acao" value="inserir">

        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../../public/partials/footer.php' ?>
