<?php

include 'conexao_.php';

try {

    $id = $_POST['id'] ?? 0;

    $nome = $_POST['nome'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $quantidade = $_POST['quantidade'] ?? 0;
    $descricao = $_POST['descricao'] ?? '';
    $fornecedor_id = $_POST['fornecedor_id'] ?? 0;

    $sql = $pdo->prepare("
        UPDATE produtos
        SET
            nome = ?,
            codigo = ?,
            preco = ?,
            estoque = ?,
            descricao = ?,
            fornecedor_id = ?
        WHERE id = ?
    ");

    $sql->execute([
        $nome,
        $codigo,
        $preco,
        $quantidade,
        $descricao,
        $fornecedor_id,
        $id
    ]);

    echo json_encode([
        "sucesso" => true,
        "mensagem" => "Produto atualizado com sucesso!"
    ]);

} catch (PDOException $e) {

    if ($e->errorInfo[1] == 1062) {

        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Esse código já está cadastrado."
        ]);

    } else {

        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Erro ao editar: " . $e->getMessage()
        ]);
    }

}