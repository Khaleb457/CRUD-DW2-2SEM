<?php
require_once __DIR__ . '/../config/db.php';

class UsuarioModel {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function inserir($nome, $email, $senha) {
        $stmt = $this->pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
        return $stmt->execute([$nome, $email, $senha]);
    }

    public function listarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM usuario");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        return $stmt->execute([$id]);
    }

    public function buscarPorEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function atualizar($id, $nome, $email, $senha = null) {
    $sql = "UPDATE usuario SET nome = ?, email = ?";
    $params = [$nome, $email];

    if (!empty($senha)) {
        $sql .= ", senha = ?";
        $params[] = $senha;
    }

    $sql .= " WHERE id_usuario = ?";
    $params[] = $id;

    $stmt = $this->pdo->prepare($sql); // <-- Corrigido para $this->pdo
    return $stmt->execute($params);
}


}
