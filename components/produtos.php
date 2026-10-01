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



                        <label class="produto-selecao">

                            <input type="checkbox" class="produto-checkbox" value="<?= $produto['id'] ?>">

                            Selecionar

                        </label>


                        <div class="produto-acoes">

                            <button type="button" class="btn-comprar" data-id="<?= $produto['id'] ?>">

                                Comprar

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



    <div class="cesta-acoes">

        <button
            type="button"
            id="btn-adicionar-cesta"
        >

            Adicionar selecionados à Cesta

        </button>

    </div>


</section>


<script>

document
    .getElementById("btn-adicionar-cesta")
    .addEventListener("click", function() {


        const selecionados =
            document.querySelectorAll(
                ".produto-checkbox:checked"
            );


        if (selecionados.length === 0) {

            alert(
                "Selecione pelo menos um produto."
            );

            return;

        }


        const produtos = [];


        selecionados.forEach(function(checkbox) {

            produtos.push(checkbox.value);

        });


        fetch("../php/adicionar_carrinho.php", {

            method: "POST",

            headers: {

                "Content-Type":
                    "application/json"

            },

            body: JSON.stringify({

                produtos: produtos

            })

        })


        .then(function(response) {

            return response.json();

        })


        .then(function(dados) {


            if (dados.sucesso) {


                const contador =
                    document.getElementById(
                        "contador-carrinho"
                    );


                if (contador) {

                    contador.textContent =
                        dados.total;

                }


                alert(
                    "Produtos adicionados à Cesta!"
                );

                selecionados.forEach(
                    function(checkbox) {

                        checkbox.checked = false;

                    }
                );


            } else {


                alert(
                    dados.mensagem ||
                    "Não foi possível adicionar os produtos."
                );

            }

        })


        .catch(function(erro) {

            console.error(erro);

            alert(
                "Ocorreu um erro ao adicionar os produtos."
            );

        });

    });

</script>