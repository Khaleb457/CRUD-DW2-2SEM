<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/LivroModel.php';
require_once __DIR__ . '/SessionController.php';

$livro = new LivroModel();

// Função para salvar imagem e retornar nome do arquivo
function salvarImagem($arquivo) {
    if ($arquivo['error'] === 0 && is_uploaded_file($arquivo['tmp_name'])) {
        $nomeFinal = uniqid() . '_' . basename($arquivo['name']);
        $destino = __DIR__ . '/../public/uploads/' . $nomeFinal;

        // Cria pasta se não existir
        if (!is_dir(__DIR__ . '/../public/uploads')) {
            mkdir(__DIR__ . '/../public/uploads', 0777, true);
        }

        if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
            return $nomeFinal;
        }
    }
    return null;
}

// INSERIR
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

// EDITAR
if ($_POST['acao'] === 'editar') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $categorias = $_POST['categorias'] ?? [];

    // Inicializa com a imagem atual
    $imagem = $livro->buscarPorId($id)['imagem'];

    // Verifica se foi feito upload de nova imagem
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

// EXCLUIR
if (isset($_GET['acao']) && $_GET['acao'] === 'excluir') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $livro->excluir($id);
    }
    header("Location: ../views/livro/index.php");
    exit;
}

// Adicione no início do controller, após a criação do objeto $livro
if (isset($_GET['action']) && $_GET['action'] === 'getSinopse' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    header('Content-Type: application/json');
    
    try {
        // Verifica se o ID é válido
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
        
        // Formata a descrição
        $descricao = $livroData['descricao'] ?? '';
        $descricao = htmlspecialchars($descricao);
        $descricao = nl2br($descricao);
        $descricao = empty($descricao) ? 'Sinopse não disponível.' : $descricao;
        
        echo json_encode([
            'success' => true,
            'descricao' => $descricao,
            'titulo' => htmlspecialchars($livroData['titulo'] ?? '')
        ]);
        
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Erro: ' . $e->getMessage()
        ]);
    }
    
    exit;
}


require_once '../model/LivroModel.php';

if ($_GET['action'] === 'reservar' && isset($_GET['id'])) {
    $idLivro = intval($_GET['id']);
    $idUsuario = $_SESSION['id_usuario'] ?? null;

    if (!$idUsuario) {
        echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
        exit;
    }

    $livroModel = new LivroModel();
    $success = $livroModel->reservar($idLivro, $idUsuario);

    echo json_encode([
        'success' => $success,
        'message' => $success ? 'Livro reservado com sucesso!' : 'Não foi possível reservar este livro.'
    ]);
}
