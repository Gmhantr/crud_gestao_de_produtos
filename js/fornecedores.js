const formulario = document.querySelector("#form-fp");

const lista = document.querySelector("#produtos");

const mensagem = document.querySelector("#mensagem");


let fornecedorEditando = null;



function carregarFornecedores() {


    fetch("../php/listar_fornecedores.php")


        .then(resposta => resposta.json())


        .then(fornecedores => {


            lista.innerHTML = "";



            fornecedores.forEach(fornecedor => {



                lista.innerHTML += `


                <div class="produto">


                    <div class="produto-info">


                        <strong>
                            ${fornecedor.nome}
                        </strong>


                        <span>
                            ID: ${fornecedor.id}
                        </span>


                    </div>




                    <div class="produto-botoes">


                        <button
                            type="button"
                            class="editar"
                            onclick="editarFornecedor(${fornecedor.id})">

                            Editar

                        </button>




                        <button
                            type="button"
                            class="excluir"
                            onclick="excluirFornecedor(${fornecedor.id})">

                            Excluir

                        </button>


                    </div>


                </div>


                `;


            });


        })


        .catch(erro => {


            console.error(
                "Erro ao carregar fornecedores:",
                erro
            );


            lista.innerHTML = `

                <p class="erro">
                    Erro ao carregar fornecedores.
                </p>

            `;


        });



}





formulario.addEventListener(
"submit",
function(event){


    event.preventDefault();



    const dados = new FormData(formulario);



    let url = "../php/fornecedores_.php";



    if(fornecedorEditando !== null){



        dados.append(
            "id",
            fornecedorEditando
        );



        url = "../php/editar_fornecedor.php";



    }




    fetch(url, {


        method:"POST",

        body:dados


    })


    .then(resposta => resposta.json())


    .then(resultado => {



        mensagem.innerHTML =
        resultado.mensagem;



        if(resultado.sucesso){



            mensagem.className =
            "sucesso";



            formulario.reset();



            fornecedorEditando = null;



            document.querySelector(".btn-fp").innerHTML =
            "Cadastrar";



            carregarFornecedores();



        }else{


            mensagem.className =
            "erro";


        }



    })


    .catch(erro => {



        console.error(
            "Erro:",
            erro
        );



        mensagem.innerHTML =
        "Erro ao processar operação.";



        mensagem.className =
        "erro";



    });



});







function excluirFornecedor(id){



    const confirmar = confirm(
        "Deseja realmente excluir este fornecedor?"
    );



    if(!confirmar){


        return;


    }



    const dados = new FormData();



    dados.append(
        "id",
        id
    );




    fetch("../php/excluir_fornecedor.php", {



        method:"POST",

        body:dados



    })


    .then(resposta => resposta.json())


    .then(resultado => {



        mensagem.innerHTML =
        resultado.mensagem;




        if(resultado.sucesso){



            mensagem.className =
            "sucesso";



            carregarFornecedores();



        }else{


            mensagem.className =
            "erro";


        }



    })


    .catch(erro => {



        console.error(
            "Erro ao excluir:",
            erro
        );



        mensagem.innerHTML =
        "Erro ao excluir fornecedor.";



        mensagem.className =
        "erro";



    });



}








function editarFornecedor(id){



    fetch("../php/listar_fornecedores.php")



    .then(resposta => resposta.json())



    .then(fornecedores => {



        const fornecedor = fornecedores.find(

            item => item.id == id

        );




        if(!fornecedor){


            return;


        }





        document.querySelector("#nome").value =

        fornecedor.nome;





        document.querySelector("#cnpj").value =

        fornecedor.cnpj;





        document.querySelector("#telefone").value =

        fornecedor.telefone;





        document.querySelector("#email").value =

        fornecedor.email;





        document.querySelector("#endereco").value =

        fornecedor.endereco;







        fornecedorEditando = id;







        document.querySelector(".btn-fp").innerHTML =

        "Salvar alterações";






        mensagem.innerHTML =

        "Editando fornecedor ID: " + id;




        mensagem.className =

        "editando";





        document.querySelector("#nome").focus();





    });



}








carregarFornecedores();