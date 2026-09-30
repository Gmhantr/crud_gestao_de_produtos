<?php

include __DIR__ . '/../php/conexao_.php';

$sql = $pdo->query("
    SELECT 
        id,
        nome,
        categoria
    FROM produtos
    ORDER BY id DESC
");

$produtos = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<section class="produtos">

    <div class="produtos-header">

        <div>
            <p>DESTAQUES</p>

            <h2>Produtos mais vistos</h2>
        </div>

        <a href="#" class="ver-todos">
            Ver todos
        </a>

    </div>

    <div class="produtos-grid">

        <?php if (isset($produtos) && count($produtos) > 0): ?>

            <?php foreach ($produtos as $produto): ?>

                <div class="produto-card">

                    <div class="produto-imagem">

                        <img
                            src="../img/produto.png"
                            alt="produto"
                        >

                    </div>

                    <div class="produto-info">

                        <span class="produto-categoria">
                            <?= htmlspecialchars($produto['categoria']) ?>
                        </span>

                        <h3>
                            <?= htmlspecialchars($produto['nome']) ?>
                        </h3>

                        <div class="produto-acoes">

                            <button
                                class="btn-comprar"
                                data-id="<?= $produto['id'] ?>"
                            >
                                Comprar
                            </button>

                            <button
                                class="btn-carrinho"
                                data-id="<?= $produto['id'] ?>"
                                title="Adicionar ao carrinho"
                            >

                                <img
                                    src="../img/carrinho.png"
                                    alt="Adicionar ao carrinho"
                                >

                            </button>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <p class="produtos-vazio">
                Nenhum produto disponível no momento.
            </p>

        <?php endif; ?>

    </div>

</section>