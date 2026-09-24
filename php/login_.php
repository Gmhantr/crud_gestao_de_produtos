<?php
    
    include 'conexao_.php';


    $email = $_POST['email'];

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $sql->execute([$email]);

    $usuario = $sql->fetch();

    if($usuario && password_verify($_POST['senha'], $usuario['senha'])) {
        header('Location: ../pages/main.php');
        exit;
    } else {
        echo "E-mail ou senha incorretos";
    }