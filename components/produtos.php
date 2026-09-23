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

        <?php


        if (isset($produtos) && count($produtos) > 0):

            foreach ($produtos as $produto):
        ?>

                <div class="produto-card">

                    <div class="produto-imagem">

                        <img
                            src="img/produtos/<?= htmlspecialchars($produto['imagem']) ?>"
                            alt="<?= htmlspecialchars($produto['nome']) ?>"
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
                                    src="img/carrinho.png"
                                    alt="Adicionar ao carrinho"
                                >

                            </button>

                        </div>

                    </div>

                </div>

        <?php
            endforeach;

        else:
        ?>

            <p class="produtos-vazio">
                Nenhum produto disponível no momento.
            </p>

        <?php endif; ?>

    </div>

</section>