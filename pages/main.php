<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ana Neri Materias</title>

    <link rel="stylesheet" href="../index.css">

    <link rel="stylesheet" href="../styles/home.css">

</head>

<body>

    <div class="container">

        <?php include __DIR__  . '/../components/nav.php'; ?>

        <?php include __DIR__  . '/../components/hero.php'; ?>

        <?php include  __DIR__  . '/../components/categorias.php'; ?>

        <?php include __DIR__  . '/../components/produtos.php'; ?>

        <?php include __DIR__  . '/../components/footer.php'; ?>

    </div>

</body>

</html>

