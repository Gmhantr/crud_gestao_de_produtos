<?php

session_start();

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0 && isset($_SESSION['carrinho'][$id])) {
    unset($_SESSION['carrinho'][$id]);
}

header("Location: ../pages/carrinho.php");
exit;