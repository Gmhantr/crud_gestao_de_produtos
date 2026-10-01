<?php

include 'conexao_.php';
require_once __DIR__ . '/classes/produtos_.php';

try {

    $nome = $_POST['nome'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $quantidade = $_POST['quantidade'] ?? 0;
    $descricao = $_POST['descricao'] ?? '';
    $fornecedor_id = $_POST['fornecedor_id'] ?? 0;

    $categoria = 1;

    $produto = new Produto(
        $nome,
        $codigo,
        $preco,
        $quantidade,
        $descricao,
        $categoria,
        $fornecedor_id
    );

    $sql = $pdo->prepare("
        INSERT INTO produtos
        (
            nome,
            codigo,
            preco,
            estoque,
            descricao,
            categoria,
            fornecedor_id
        )
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $sql->execute([
        $produto->getNome(),
        $produto->getCodigo(),
        $produto->getPreco(),
        $produto->getEstoque(),
        $produto->getDescricao(),
        $produto->getCategoria(),
        $produto->getFornecedorId()
    ]);

    echo json_encode([
        "sucesso" => true,
        "mensagem" => "Produto cadastrado com sucesso!"
    ]);

} catch (PDOException $e) {

    if ($e->errorInfo[1] == 1062) {

        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Esse código de produto já está cadastrado."
        ]);

    } else {

        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Erro no banco de dados: " . $e->getMessage()
        ]);
    }

}