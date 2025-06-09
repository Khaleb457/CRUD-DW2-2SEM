<?php
require_once __DIR__ . '/../config/db.php';


class CategoriaModel {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function listarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM categoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir($nome_categoria) {
        $stmt = $this->pdo->prepare("INSERT INTO categoria (nome_categoria) VALUES (?)");
        return $stmt->execute([$nome_categoria]);
    }

    public function atualizar($id, $nome_categoria) {
        $stmt = $this->pdo->prepare("UPDATE categoria SET nome_categoria = ? WHERE id_categoria = ?");
        return $stmt->execute([$nome_categoria, $id]);
    }

    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        return $stmt->execute([$id]);
    }
}
