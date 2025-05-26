<?php
require_once '../model/LivroModel.php';

$livroModel = new LivroModel();

$idLivro = $livroModel->inserir($_POST["titulo"], $_POST["autor"], $_POST["descricao"]);

if ($idLivro) {
    $categorias = $_POST["categorias"] ?? []; // array de categorias selecionadas

    $sucessoCategorias = true;

    foreach ($categorias as $idCategoria) {
        $ok = $livroModel->inserirCategoria($idLivro, $idCategoria);
        if (!$ok) {
            $sucessoCategorias = false;
            break;
        }
    }

    if ($sucessoCategorias) {
        echo "Livro e categorias inseridos com sucesso!";
    } else {
        echo "Livro inserido, mas falha ao inserir categorias.";
    }
} else {
    echo "Falha ao inserir o livro.";
}

?>