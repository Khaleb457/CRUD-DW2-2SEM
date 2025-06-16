<?php
session_start();

class SessionController {
    public static function login($id, $nome, $tipo) {
        $_SESSION['id_usuario'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = $tipo;
    }

    public static function logout() {
        session_destroy();
        header("Location: ../public/index.php");
        exit;
    }

    public static function isLoggedIn() {
        return isset($_SESSION['id_usuario']);
    }

    public static function getTipoUsuario() {
        return $_SESSION['tipo'] ?? null;
    }

    public static function getIdUsuario() {
        return $_SESSION['id_usuario'] ?? null;
    }

        public static function getNomeUsuario() {
        return $_SESSION['nome'] ?? null;
    }
}
?>
