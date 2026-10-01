<?php

include 'conexao_.php';
require_once __DIR__ . '/classes/usuarios.php';

$nome = $_POST['nome'] ?? "";
$email = $_POST['email'] ?? "";
$senha = $_POST['senha'] ?? "";
$confirmar_senha = $_POST['confirmar-senha'] ?? "";

if ($senha !== $confirmar_senha) {

    $mensagem = "As senhas não coincidem.";
    $css = "erro";

    header("Location: ../pages/cadastro.php?mensagem=$mensagem&css=$css");
    exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$usuario = new Usuario(
    $nome,
    $email,
    $senha_hash
);

try {

    $sql = $pdo->prepare("
        INSERT INTO usuarios
        (nome, email, senha)
        VALUES (?, ?, ?)
    ");

    $sql->execute([
        $usuario->getNome(),
        $usuario->getEmail(),
        $usuario->getSenha()
    ]);

    $mensagem = "Cadastro realizado com sucesso";
    $css = "sucesso";

    header("Location: ../pages/cadastro.php?mensagem=$mensagem&css=$css");
    exit;

} catch (PDOException $e) {

    if ($e->errorInfo[1] == 1062) {

        $mensagem = "Esse email já está sendo utilizado!";
        $css = "erro";

        header("Location: ../pages/cadastro.php?mensagem=$mensagem&css=$css");
        exit;

    } else {

        $mensagem = "Erro ao cadastrar o usuário";
        $css = "erro";

        header("Location: ../pages/cadastro.php?mensagem=$mensagem&css=$css");
        exit;
    }
}

