<?php

var_dump($_POST);

include 'conexao_.php';

$nome = $_POST['nome'] ?? "";
$email = $_POST['email'] ?? "";

if ($_POST['senha'] === $_POST['confirmar-senha']) {
    $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?)");
    $operation = $sql->execute(array($nome, $email, $senha_hash));

    if ($operation) {
        echo "Usuario cadastrado com sucesso!";
        return;
    } else {
        http_response_code(404);
        die("erro ao cadastrar usuario");
    }

} else {
    die("As senhas não coincidem.");
}