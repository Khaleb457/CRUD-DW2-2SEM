<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/SessionController.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!SessionController::isLoggedIn()) {
        echo json_encode(['success' => false, 'message' => 'Você precisa estar logado.']);
        exit;
    }

    $idLivro = $_POST['id_livro'] ?? null;
    $idUsuario = SessionController::getIdUsuario();
    $dataReserva = date('Y-m-d H:i:s');


    if (!$idLivro) {
        echo json_encode(['success' => false, 'message' => 'ID do livro não informado.']);
        exit;
    }

    // ✅ Criando conexão com PDO
    $db = new Database();
    $pdo = $db->getConnection();

    // ✅ Preparando e executando com PDO
    $query = "UPDATE livro SET status = 'reservado', id_usuario_reserva = ?, data_reserva = ? WHERE id_livro = ?";
    $stmt = $pdo->prepare($query);

    try {
        $stmt->execute([$idUsuario, $dataReserva, $idLivro]);
        echo json_encode(['success' => true, 'message' => 'Livro reservado com sucesso.']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao reservar o livro.', 'error' => $e->getMessage()]);
    }
}
