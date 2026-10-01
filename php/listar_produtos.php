<?php

include 'conexao_.php';

try {

    $sql = $pdo->query("
        SELECT
            id,
            nome,
            codigo,
            preco,
            estoque,
            descricao,
            categoria,
            fornecedor_id
        FROM produtos
        ORDER BY id DESC
    ");

    $produtos = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($produtos);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}