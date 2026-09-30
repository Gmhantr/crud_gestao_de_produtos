<?php

include 'conexao_.php';

var_dump($_POST);

$nome = $_POST['nome'] ?? "";
$codigo = (int) ($_POST['codigo'] ?? 0);
$preco = (float) ($_POST['preco'] ?? 0);
$quantidade = (int) ($_POST['quantidade'] ?? 0);
$descricao = $_POST['descricao'] ?? "";
$fornecedor_id = (int) ($_POST['fornecedor_id'] ?? 0);

$categoria = 1;

try {

    $sql = $pdo->prepare("
        INSERT INTO produtos
        (nome, codigo, preco, estoque, descricao, categoria, fornecedor_id)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $sql->execute([
        $nome,
        $codigo,
        $preco,
        $quantidade,
        $descricao,
        $categoria,
        $fornecedor_id
    ]);

    $mensagem = "Produto cadastrado com sucesso";
    $css = "sucesso";

    header("Location: ../pages/cadastrar_produto.php?mensagem=$mensagem&css=$css");
    exit;

} catch (PDOException $e) {

    if ($e->errorInfo[1] === 1062) {

        $mensagem = "Esse código já está cadastrado!";
        $css = "erro";

        
        header("Location: ../pages/cadastrar_produto.php?mensagem=$mensagem&css=$css");
        exit;

    } else {

        $mensagem = "Erro ao cadastrar o produto";
        $css = "erro";

        header("Location: ../pages/cadastrar_produto.php?mensagem=$mensagem&css=$css");
        exit;
    }
}