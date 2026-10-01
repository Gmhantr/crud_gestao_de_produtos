<?php

session_start();

unset($_SESSION['carrinho']);

header("Location: ../pages/main.php");
exit;