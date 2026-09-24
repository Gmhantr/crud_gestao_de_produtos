<?php 

$nome = $_POST['nome'] ?? "";
$email = $_POST['email'] ?? "";


if ($_POST['senha'] === $_POST['confirmar-senha']) {
    $senha_hash = password_hash(['senha'], PASSWORD_DEFAULT);

}
