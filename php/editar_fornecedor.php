<?php

include 'conexao_.php';



try {


    $sql = $pdo->prepare("

        UPDATE fornecedores

        SET

            nome = ?,
            cnpj = ?,
            telefone = ?,
            email = ?,
            endereco = ?

        WHERE id = ?

    ");



    $sql->execute([


        $_POST['nome'],
        $_POST['cnpj'],
        $_POST['telefone'],
        $_POST['email'],
        $_POST['endereco'],
        $_POST['id']


    ]);



    echo json_encode([

        "sucesso" => true,

        "mensagem" => "Fornecedor atualizado"

    ]);



}catch(PDOException $e){


    echo json_encode([

        "sucesso"=>false,

        "mensagem"=>$e->getMessage()

    ]);


}