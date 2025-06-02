<?php
require_once '../model/UsuarioModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioModel = new UsuarioModel();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; // Em produção, utilize password_hash()

    $resultado = $usuarioModel->inserir($nome, $email, $senha);

    if ($resultado) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}
