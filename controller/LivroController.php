<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/LivroModel.php';
require_once __DIR__ . '/SessionController.php';

$livro = new LivroModel();

// ======= SINOPSE VIA FETCH/JSON =======
if (isset($_GET['action']) && $_GET['action'] === 'getSinopse' && isset($_GET['id'])) {
    header('Content-Type: application/json');

    try {
        $id = $_GET['id'];

        if (!is_numeric($id)) {
            throw new Exception('ID inválido');
        }

        $livroData = $livro->buscarPorId($id);

        if (!$livroData) {
            echo json_encode([
                'success' => false,
                'message' => 'Livro não encontrado'
            ]);
            exit;
        }

        echo json_encode([
            'success' => true,
            'descricao' => nl2br(htmlspecialchars($livroData['descricao'] ?? '')),
            'titulo' => htmlspecialchars($livroData['titulo'] ?? '')
        ]);
        exit;

    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Erro: ' . $e->getMessage()
        ]);
        exit;
    }
}

// ======= RESERVAR LIVRO =======
if (isset($_GET['action']) && $_GET['action'] === 'reservar' && isset($_GET['id'])) {
    header('Content-Type: application/json');

    $idLivro = intval($_GET['id']);
    $idUsuario = $_SESSION['id_usuario'] ?? null;

    if (!$idUsuario) {
        echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
        exit;
    }

    $success = $livro->reservar($idLivro, $idUsuario);

    echo json_encode([
        'success' => $success,
        'message' => $success ? 'Livro reservado com sucesso!' : 'Não foi possível reservar este livro.'
    ]);
    exit;
}

// ======= INSERIR LIVRO =======
function salvarImagem($arquivo) {
    if ($arquivo['error'] === 0 && is_uploaded_file($arquivo['tmp_name'])) {
        $nomeFinal = uniqid() . '_' . basename($arquivo['name']);
        $destino = __DIR__ . '/../public/uploads/' . $nomeFinal;

        if (!is_dir(__DIR__ . '/../public/uploads')) {
            mkdir(__DIR__ . '/../public/uploads', 0777, true);
        }

        if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
            return $nomeFinal;
        }
    }
    return null;
}

if (isset($_POST['acao']) && $_POST['acao'] === 'inserir') {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $categorias = $_POST['categorias'] ?? [];

    $imagem = isset($_FILES['imagem']) ? salvarImagem($_FILES['imagem']) : null;

    if (!empty($titulo) && !empty($autor)) {
        $idLivro = $livro->inserir($titulo, $autor, $descricao, 'disponivel', $imagem);
        if ($idLivro) {
            foreach ($categorias as $idCategoria) {
                $livro->inserirCategoria($idLivro, $idCategoria);
            }
        }
    }

    header("Location: ../views/livro/index.php");
    exit;
}

// ======= EDITAR LIVRO =======
if ($_POST['acao'] === 'editar') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $categorias = $_POST['categorias'] ?? [];

    $imagem = $livro->buscarPorId($id)['imagem'];

    if (!empty($_FILES['imagem']['name'])) {
        $nomeImagem = uniqid() . '_' . $_FILES['imagem']['name'];
        $caminhoImagem = __DIR__ . '/../public/uploads/' . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
            $imagem = $nomeImagem;
        }
    }

    $livro->atualizar($id, $titulo, $autor, $descricao, $status, $imagem, $categorias);
    header('Location: ../views/livro/index.php');
    exit;
}

// ======= EXCLUIR LIVRO =======
if (isset($_GET['acao']) && $_GET['acao'] === 'excluir') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $livro->excluir($id);
    }
    header("Location: ../views/livro/index.php");
    exit;
}
