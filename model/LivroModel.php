<?php
require_once '../config/db.php';

class LivroModel {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function listarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM livro");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM livro WHERE id_livro = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir($titulo, $autor, $descricao, $status = 'disponivel') {
        $stmt = $this->pdo->prepare("INSERT INTO livro (titulo, autor, descricao, status) VALUES (?, ?, ?, ?)");
        $success = $stmt->execute([$titulo, $autor, $descricao, $status]);
        if ($success) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }
    

    public function inserirCategoria($id_livro, $id_categoria) {
        $stmt = $this->pdo->prepare("INSERT INTO livro_categoria (id_livro, id_categoria) VALUES (?, ?)");
        return $stmt->execute([$id_livro, $id_categoria]);
    }


    public function atualizar($id, $titulo, $autor, $descricao, $status) {
        $stmt = $this->pdo->prepare("UPDATE livro SET titulo = ?, autor = ?, descricao = ?, status = ? WHERE id_livro = ?");
        return $stmt->execute([$titulo, $autor, $descricao, $status, $id]);
    }

    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM livro WHERE id_livro = ?");
        return $stmt->execute([$id]);
    }
}
