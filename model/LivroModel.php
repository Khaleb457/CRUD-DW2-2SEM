<?php
require_once __DIR__ . '/../config/db.php';

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

    public function inserir($titulo, $autor, $descricao, $status = 'disponivel', $imagem = null) {
        $stmt = $this->pdo->prepare("INSERT INTO livro (titulo, autor, descricao, status, imagem) VALUES (?, ?, ?, ?, ?)");
        $success = $stmt->execute([$titulo, $autor, $descricao, $status, $imagem]);
        if ($success) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }

    public function inserirCategoria($id_livro, $id_categoria) {
        $stmt = $this->pdo->prepare("INSERT INTO livro_categoria (id_livro, id_categoria) VALUES (?, ?)");
        return $stmt->execute([$id_livro, $id_categoria]);
    }

    public function atualizar($id, $titulo, $autor, $descricao, $status, $imagem = null) {
        $stmt = $this->pdo->prepare("UPDATE livro SET titulo = ?, autor = ?, descricao = ?, status = ?, imagem = ? WHERE id_livro = ?");
        return $stmt->execute([$titulo, $autor, $descricao, $status, $imagem, $id]);
    }


    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM livro WHERE id_livro = ?");
        return $stmt->execute([$id]);
    }
    
    public function removerCategoriasDoLivro($id_livro) {
        $stmt = $this->pdo->prepare("DELETE FROM livro_categoria WHERE id_livro = ?");
        return $stmt->execute([$id_livro]);
    }

    public function buscarCategoriasPorLivro($id_livro) {
        $stmt = $this->pdo->prepare("SELECT id_categoria FROM livro_categoria WHERE id_livro = ?");
        $stmt->execute([$id_livro]);
        return array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'id_categoria');
    }

public function listarComCategorias() {
    $stmt = $this->pdo->query("
        SELECT 
            l.id_livro,
            l.titulo,
            l.autor,
            l.descricao,
            l.status,
            l.id_usuario_reserva,
            u.nome AS nome_reserva,
            GROUP_CONCAT(c.nome_categoria SEPARATOR ', ') AS categorias
        FROM livro l
        LEFT JOIN livro_categoria lc ON l.id_livro = lc.id_livro
        LEFT JOIN categoria c ON lc.id_categoria = c.id_categoria
        LEFT JOIN usuario u ON l.id_usuario_reserva = u.id_usuario
        GROUP BY l.id_livro
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function buscarPorCategoria($id_categoria) {
        $sql = "
            SELECT l.*
            FROM livro l
            INNER JOIN livro_categoria lc ON l.id_livro = lc.id_livro
            WHERE lc.id_categoria = ?
            GROUP BY l.id_livro
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_categoria]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function reservar($idLivro, $idUsuario) {
         $stmt = $this->pdo->prepare("UPDATE livro SET status = 'reservado', id_usuario_reserva = ? WHERE id_livro = ? AND status = 'disponivel'");
        return $stmt->execute([$idUsuario, $idLivro]);    
    }

    public function listarReservadosPorUsuario($idUsuario) {
        $stmt = $this->pdo->prepare("
            SELECT titulo, autor, data_reserva 
            FROM livro 
            WHERE status = 'reservado' AND id_usuario_reserva = :id_usuario
            ORDER BY data_reserva DESC
        ");
        
        $stmt->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
    
}
