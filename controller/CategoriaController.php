<?php
require_once "../config/db.php";
require_once "../model/CategoriaModel.php";

$categoria = new CategoriaModel();

// INSERIR
if (isset($_POST['acao']) && $_POST['acao'] === 'inserir') {
    $nome = $_POST['nome_categoria'] ?? '';
    if (!empty($nome)) {
        $categoria->inserir($nome);
    }
    header("Location: ../views/categoria/index.php");
    exit;
}

// EDITAR
if (isset($_POST['acao']) && $_POST['acao'] === 'editar') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    if ($id && !empty($nome)) {
        $categoria->atualizar($id, $nome);
    }
    header("Location: ../views/categoria/index.php");
    exit;
}

// EXCLUIR
if (isset($_GET['acao']) && $_GET['acao'] === 'excluir') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $categoria->excluir($id);
    }
    header("Location: ../views/categoria/index.php");
    exit;
}else {
    echo "erro ao excluir";
}
