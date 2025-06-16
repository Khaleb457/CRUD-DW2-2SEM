<?php
require_once __DIR__ . '/../controller/SessionController.php';

// Destrói a sessão
SessionController::logout();

// Redireciona para a página inicial
header('Location: /');  // Ou use BASE_URL se definido
exit;