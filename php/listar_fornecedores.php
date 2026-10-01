<?php

include 'conexao_.php';



$sql = $pdo->query("

    SELECT

        id,
        nome,
        cnpj,
        telefone,
        email,
        endereco

    FROM fornecedores

    ORDER BY id DESC

");



echo json_encode(

    $sql->fetchAll(PDO::FETCH_ASSOC)

);