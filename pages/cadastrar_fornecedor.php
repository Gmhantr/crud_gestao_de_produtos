<?php include __DIR__ . '/../components/nav.php'; ?>
<?php include __DIR__ . '/../components/admin.php'; ?>

<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}


?>
<link rel="stylesheet" href="../styles/admin.css">
<link rel="stylesheet" href="../index.css">
<link rel="stylesheet" href="../styles/nav.css">
<link rel="stylesheet" href="../styles/cadastro_fornecedor_produtos.css">
<link rel="stylesheet" href="../styles/footer.css">
<link rel="stylesheet" href="../styles/autenticacao.css">


<main id="cadastro_fp">


    <section class="area-produtos">


        <form id="form-fp">


            <h1>
                Cadastro de Fornecedor
            </h1>



            <label for="nome">
                Nome do Fornecedor:
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite o nome"
                required
            >



            <label for="cnpj">
                CNPJ:
            </label>

            <input
                type="text"
                id="cnpj"
                name="cnpj"
                placeholder="Digite o CNPJ"
                required
            >



            <label for="telefone">
                Telefone:
            </label>

            <input
                type="tel"
                id="telefone"
                name="telefone"
                placeholder="Digite o telefone"
                required
            >



            <label for="email">
                Email:
            </label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Digite o email"
                required
            >



            <label for="endereco">
                Endereço:
            </label>

            <input
                type="text"
                id="endereco"
                name="endereco"
                placeholder="Digite o endereço"
                required
            >



            <div id="mensagem"></div>



            <button
                type="submit"
                class="btn-fp"
            >

                Cadastrar

            </button>


        </form>





        <section id="lista-produtos">


            <h2>
                Fornecedores cadastrados
            </h2>



            <div id="produtos"></div>


        </section>


    </section>


</main>



<script src="../js/fornecedores.js"></script>


<?php include __DIR__ . '/../components/footer.php'; ?>