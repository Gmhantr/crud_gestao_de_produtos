<?php

session_start();

include 'conexao_.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$sql->execute([$email]);

$usuario = $sql->fetch();

if ($usuario && password_verify($senha, $usuario['senha'])) {

    $_SESSION['id'] = $usuario['id'];
    $_SESSION['email'] = $usuario['email'];

    header('Location: ../pages/main.php');
    exit;



} else {
    $mensagem = "E-mail ou senha incorretos";
    $css = "erro";
    header("Location: ../pages/login.php?mensagem=$mensagem&css=$css");
    exit;

}