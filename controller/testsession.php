<?php
require_once 'SessionController.php'; // Incluindo o controlador de sessão

// Iniciar a sessão
//session_start();

// Verificar se a sessão já foi iniciada e se um usuário está logado
if (SessionController::isLoggedIn()) {
    echo "Sessão ativa!<br>";
    echo "ID do usuário: " . SessionController::getIdUsuario() . "<br>";
    echo "Nome do usuário: " . SessionController::getNomeUsuario() . "<br>";
    echo "Tipo de usuário: " . SessionController::getTipoUsuario() . "<br>";
} else {
    echo "Nenhuma sessão ativa. Usuário não está logado.";
}
?>