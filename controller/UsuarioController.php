<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioModel = new UsuarioModel();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

    $resultado = $usuarioModel->inserir($nome, $email, $senha);

    if ($resultado) {
        header("Location: ../public/index.php");
    } else {
        echo "Erro ao cadastrar usuário.";
    }

    
}
