<?php include __DIR__ . '/../components/nav.php'; ?>

<?php

session_start();


if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}



$carrinho = $_SESSION['carrinho'] ?? [];
$total = 0;
$quantidadeProdutos = count($carrinho);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="../styles/carrinho.css">
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>

<main class="carrinho">

    <h1>Carrinho</h1>

    <?php if (empty($carrinho)): ?>

        <div class="carrinho-vazio">
            <p>Seu carrinho está vazio.</p>
        </div>

    <?php else: ?>

        <div class="itens-carrinho">

            <?php foreach ($carrinho as $item): ?>

                <?php $total += $item['preco']; ?>

                <div class="item-carrinho">

                    <div class="item-imagem">
                        <img src="../img/produto.png" alt="Produto">
                    </div>

                    <div class="item-info">
                        <h3><?= htmlspecialchars($item['nome']) ?></h3>
                        <span>1 unidade</span>
                    </div>

                    <div class="item-preco">
                        R$ <?= number_format($item['preco'], 2, ",", ".") ?>
                    </div>

                    <a
                        href="../php/remover_carrinho.php?id=<?= $item['id'] ?>"
                        class="btn-remover"
                    >
                        Remover
                    </a>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="carrinho-bottom">

            <div class="resumo">

                <h2>Resumo da Cesta</h2>

                <div class="resumo-info">
                    <span>Produtos selecionados</span>
                    <span><?= $quantidadeProdutos ?></span>
                </div>

                <div class="resumo-total">
                    <span>Total</span>
                    <span>R$ <?= number_format($total, 2, ",", ".") ?></span>
                </div>

                <a
                    href="../php/finalizar_compra.php"
                    class="btn-finalizar"
                >
                    Finalizar compra
                </a>

            </div>

        </div>

    <?php endif; ?>

</main>

<?php include __DIR__ . '/../components/footer.php'; ?>

</body>
</html>

