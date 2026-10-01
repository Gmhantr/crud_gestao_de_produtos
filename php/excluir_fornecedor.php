<?php

include 'conexao_.php';


try {


    $id = $_POST['id'] ?? 0;



    $verificar = $pdo->prepare("

        SELECT COUNT(*) 

        FROM produtos

        WHERE fornecedor_id = ?

    ");



    $verificar->execute([$id]);



    $quantidadeProdutos = $verificar->fetchColumn();



    if($quantidadeProdutos > 0){


        echo json_encode([

            "sucesso" => false,

            "mensagem" => 
            "Não é possível excluir este fornecedor. Existem produtos vinculados a ele. Exclua os produtos ou altere o fornecedor."

        ]);



        exit;


    }




    $sql = $pdo->prepare("

        DELETE FROM fornecedores

        WHERE id = ?

    ");



    $sql->execute([$id]);



    echo json_encode([

        "sucesso" => true,

        "mensagem" => "Fornecedor excluído com sucesso."

    ]);



}catch(PDOException $e){



    echo json_encode([

        "sucesso" => false,

        "mensagem" => "Erro ao excluir fornecedor: ".$e->getMessage()

    ]);


}