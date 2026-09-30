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

    <link rel="stylesheet" href="../styles/hero.css">

    <link rel="stylesheet" href="../styles/nav.css">


    <link rel="stylesheet" href="../styles/categorias.css">

    <link rel="stylesheet" href="../styles/produtos.css">

    
    <link rel="stylesheet" href="../styles/footer.css">


    <link rel='stylesheet' href='../styles/admin.css'>



</head>

<body>

    <div class="container">

        
        <?php include __DIR__  . '/../components/nav.php'; ?>

        <?php include __DIR__ . '/../components/admin.php'?>   
         

        <?php include  __DIR__  . '/../components/categorias.php'; ?>

        <?php include __DIR__  . '/../components/produtos.php'; ?>

        <?php include __DIR__  . '/../components/footer.php'; ?>

    </div>

</body>

</html>

