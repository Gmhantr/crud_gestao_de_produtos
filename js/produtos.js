const formulario = document.querySelector("#form-fp");
const lista = document.querySelector("#produtos");
const mensagem = document.querySelector("#mensagem");

let produtoEditando = null;



function carregarProdutos() {

    fetch("../php/listar_produtos.php")

        .then(resposta => resposta.json())

        .then(produtos => {

            lista.innerHTML = "";

            produtos.forEach(produto => {

                lista.innerHTML += `

                    <div class="produto">

                        <div class="produto-info">

                            <strong>
                                ${produto.nome}
                            </strong>

                            <span>
                                ID: ${produto.id}
                            </span>

                        </div>

                        <div class="produto-botoes">

                            <button
                                type="button"
                                class="editar"
                                onclick="editarProduto(${produto.id})">
                                Editar
                            </button>

                            <button
                                type="button"
                                class="excluir"
                                onclick="excluirProduto(${produto.id})">
                                Excluir
                            </button>

                        </div>

                    </div>

                `;

            });

        })

        .catch(erro => {

            console.error(erro);

            lista.innerHTML = `
                <p class="erro">
                    Erro ao carregar produtos.
                </p>
            `;

        });

}



formulario.addEventListener("submit", function(event) {

    event.preventDefault();

    const dados = new FormData(formulario);


    let url = "../php/produtos_.php";


    if (produtoEditando !== null) {

        dados.append("id", produtoEditando);

        url = "../php/editar_produto.php";

    }


    fetch(url, {

        method: "POST",
        body: dados

    })

    .then(resposta => resposta.json())

    .then(resultado => {

        mensagem.textContent = resultado.mensagem;

        if (resultado.sucesso) {

            mensagem.className = "sucesso";

            formulario.reset();

            produtoEditando = null;

            document.querySelector(".btn-fp").textContent = "Cadastrar";

            carregarProdutos();

        } else {

            mensagem.className = "erro";

        }

    })

    .catch(erro => {

        console.error(erro);

        mensagem.textContent = "Erro ao processar a operação.";
        mensagem.className = "erro";

    });

});



function excluirProduto(id) {

    const confirmar = confirm(
        "Deseja realmente excluir este produto?"
    );


    if (!confirmar) {

        return;

    }


    const dados = new FormData();

    dados.append("id", id);


    fetch("../php/excluir_produto.php", {

        method: "POST",
        body: dados

    })

    .then(resposta => resposta.json())

    .then(resultado => {

        mensagem.textContent = resultado.mensagem;

        if (resultado.sucesso) {

            mensagem.className = "sucesso";

            carregarProdutos();

        } else {

            mensagem.className = "erro";

        }

    })

    .catch(erro => {

        console.error(erro);

        mensagem.textContent =
            "Erro ao excluir o produto.";

        mensagem.className = "erro";

    });

}



function editarProduto(id) {

    fetch("../php/listar_produtos.php")

        .then(resposta => resposta.json())

        .then(produtos => {

            const produto = produtos.find(
                produto => produto.id == id
            );


            if (!produto) {

                return;

            }


            document.querySelector("#nome").value =
                produto.nome;

            document.querySelector("#codigo").value =
                produto.codigo;

            document.querySelector("#preco").value =
                produto.preco;

            document.querySelector("#quantidade").value =
                produto.estoque;

            document.querySelector("#descricao").value =
                produto.descricao;

            document.querySelector("#fornecedor_id").value =
                produto.fornecedor_id;


            produtoEditando = id;


            document.querySelector(".btn-fp").textContent =
                "Salvar alterações";


            mensagem.textContent =
                "Editando produto ID: " + id;

            mensagem.className = "editando";


            document.querySelector("#nome").focus();

        });

}



carregarProdutos();