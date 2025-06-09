<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/LivroModel.php';

$livro = new LivroModel();

// INSERIR
if (isset($_POST['acao']) && $_POST['acao'] === 'inserir') {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $categorias = $_POST['categorias'] ?? [];

    if (!empty($titulo) && !empty($autor)) {
        $idLivro = $livro->inserir($titulo, $autor, $descricao);
        if ($idLivro) {
            foreach ($categorias as $idCategoria) {
                $livro->inserirCategoria($idLivro, $idCategoria);
            }
        }
    }

    header("Location: ../views/livro/index.php");
    exit;
}

// EDITAR
if (isset($_POST['acao']) && $_POST['acao'] === 'editar') {
    $id = $_POST['id'] ?? null;
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $status = $_POST['status'] ?? 'disponivel';
    $categorias = $_POST['categorias'] ?? [];

    if ($id && !empty($titulo) && !empty($autor)) {
        $livro->atualizar($id, $titulo, $autor, $descricao, $status);

        // (Opcional: apagar categorias antigas e inserir novas, se necessário)
        // Simplesmente excluindo tudo e inserindo de novo (para evitar lógica complicada):
        $livro->removerCategoriasDoLivro($id); // novo método que você pode criar
        foreach ($categorias as $idCategoria) {
            $livro->inserirCategoria($id, $idCategoria);
        }
    }

    header("Location: ../views/livro/index.php");
    exit;
}

// EXCLUIR
if (isset($_GET['acao']) && $_GET['acao'] === 'excluir') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $livro->excluir($id);
    }
    header("Location: ../views/livro/index.php");
    exit;
}
