<?php


include 'conexao_.php';

$nome = $_POST['nome'] ?? "";
$email = $_POST['email'] ?? "";

if ($_POST['senha'] === $_POST['confirmar-senha']) {

    $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
} else {
    die("As senhas não coincidem.");
}

    try {

        $sql = $pdo->prepare("
        INSERT INTO usuarios (nome, email, senha)
        VALUES (?, ?, ?)
    ");
        $sql->execute([
        $nome,
        $email,
        $senha_hash
    ]);

    echo "usuario cadastrado com sucesso";

            $mensagem = "Cadastro Realizado com sucesso";
            $css = "sucesso";
            header("Location: ../pages/cadastro.php?mensagem=$mensagem&css=$css");
            exit;

    } catch (PDOException $e) {

        if ($e -> errorInfo[1] == 1062){
            $mensagem = "Esse email ja esta sendo utilizado!";
            $css = "erro";
            header("Location: ../pages/cadastro.php?mensagem=$mensagem&css=$css");
            exit;
    exit;
        } else {
            $mensagem = "Erro ao cadastrar o usuario";
            $css = "erro";
        }

    }






