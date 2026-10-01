<?php

include 'conexao_.php';

try {

    $id = $_POST['id'] ?? 0;

    $sql = $pdo->prepare("
        DELETE FROM produtos
        WHERE id = ?
    ");

    $sql->execute([$id]);

    echo json_encode([
        "sucesso" => true,
        "mensagem" => "Produto excluído com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Erro ao excluir: " . $e->getMessage()
    ]);

}