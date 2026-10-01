document.querySelectorAll(".btn-carrinho").forEach(botao => {

    botao.addEventListener("click", function(){

        let id = this.dataset.id;

        fetch("php/adicionar_carrinho.php", {

            method: "POST",

            headers: {
                "Content-Type":
                "application/x-www-form-urlencoded"
            },

            body: "id=" + id

        })

        .then(response => response.json())

        .then(dados => {

            if(dados.sucesso){

                document.getElementById("contador-carrinho").innerText =
                    dados.total;

                alert("Produto adicionado");
            }

        });

    });

});