<?php

include 'conexao_.php';

require_once __DIR__ . '/classes/fornecedores_.php';


try {


    $fornecedor = new Fornecedor(

        $_POST['nome'] ?? "",
        $_POST['cnpj'] ?? "",
        $_POST['telefone'] ?? "",
        $_POST['email'] ?? "",
        $_POST['endereco'] ?? ""

    );



    $sql = $pdo->prepare("

        INSERT INTO fornecedores

        (
            nome,
            cnpj,
            telefone,
            email,
            endereco
        )

        VALUES (?,?,?,?,?)

    ");



    $sql->execute([

        $fornecedor->getNome(),
        $fornecedor->getCnpj(),
        $fornecedor->getTelefone(),
        $fornecedor->getEmail(),
        $fornecedor->getEndereco()

    ]);



    echo json_encode([

        "sucesso" => true,

        "mensagem" => "Fornecedor cadastrado com sucesso"

    ]);



} catch(PDOException $e) {


    if($e->errorInfo[1] == 1062){


        echo json_encode([

            "sucesso" => false,

            "mensagem" => "Esse CNPJ já está cadastrado"

        ]);



    }else{


        echo json_encode([

            "sucesso" => false,

            "mensagem" => $e->getMessage()

        ]);


    }


}