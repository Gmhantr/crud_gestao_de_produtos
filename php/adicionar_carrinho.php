<?php

session_start();

include 'conexao_.php';

require_once __DIR__ . '/classes/produtos_.php';

header('Content-Type: application/json; charset=utf-8');


$dados = json_decode(
    file_get_contents("php://input"),
    true
);


if (
    !isset($dados['produtos']) ||
    !is_array($dados['produtos']) ||
    count($dados['produtos']) === 0
) {

    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'Nenhum produto foi selecionado.'
    ]);

    exit;
}


if (!isset($_SESSION['carrinho'])) {

    $_SESSION['carrinho'] = [];

}


$produtoClasse = new Produto(
    "",
    0,
    0,
    0,
    "",
    0,
    0
);


foreach ($dados['produtos'] as $id) {

    $id = (int) $id;


    if ($id <= 0) {
        continue;
    }


    $produto = $produtoClasse->buscarPorId(
        $pdo,
        $id
    );


    if (!$produto) {
        continue;
    }


    if (!isset($_SESSION['carrinho'][$id])) {

        $_SESSION['carrinho'][$id] = [

            'id' => $produto['id'],

            'nome' => $produto['nome'],

            'preco' => $produto['preco']

        ];

    }

}


$totalItens = count($_SESSION['carrinho']);


echo json_encode([

    'sucesso' => true,

    'total' => $totalItens

]);

exit;