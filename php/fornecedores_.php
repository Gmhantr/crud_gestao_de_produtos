<?php

include 'conexao_.php';

var_dump($_POST);

$nome = $_POST['nome'] ?? "";
$cnpj = $_POST['cnpj'] ?? "";
$telefone = $_POST['telefone'] ?? "";
$email = $_POST['email'] ?? "";
$endereco = $_POST['endereco'] ?? "";

try {

    $sql = $pdo->prepare("
        INSERT INTO fornecedores
        (nome, cnpj, telefone, email, endereco)
        VALUES (?, ?, ?, ?, ?)
    ");

    $sql->execute([
        $nome,
        $cnpj,
        $telefone,
        $email,
        $endereco
    ]);

    $mensagem = "Fornecedor cadastrado com sucesso";
    $css = "sucesso";

     header("Location: ../pages/cadastrar_fornecedor.php?mensagem=$mensagem&css=$css");
     exit;

} catch (PDOException $e) {

    if ($e->errorInfo[1] === 1062) {

        $mensagem = "Esse CNPJ já está cadastrado!";
        $css = "erro";

        header("Location: ../pages/cadastrar_fornecedor.php?mensagem=$mensagem&css=$css");
     exit;

    } else {

        $mensagem = "Erro ao cadastrar o fornecedor";
        $css = "erro";

        header("Location: ../pages/cadastrar_fornecedor.php?mensagem=$mensagem&css=$css");
     exit;
    }
}