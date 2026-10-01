<?php


session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}


include __DIR__ . '/../components/nav.php';
include __DIR__ . '/../components/admin.php';

include __DIR__ . '/../php/conexao_.php';



$sql = $pdo->query("
    SELECT id, nome
    FROM fornecedores
    ORDER BY nome
");

$fornecedores = $sql->fetchAll(PDO::FETCH_ASSOC);

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

            <h1>Cadastro de Produto</h1>


            <label for="nome">
                Nome do Produto:
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite o nome do Produto"
                required
            >


            <label for="codigo">
                Código do Produto:
            </label>

            <input
                type="text"
                id="codigo"
                name="codigo"
                placeholder="Digite o código do Produto"
                required
            >


            <label for="preco">
                Preço do Produto:
            </label>

            <input
                type="number"
                id="preco"
                name="preco"
                placeholder="Digite o preço do Produto"
                step="0.01"
                required
            >


            <label for="quantidade">
                Quantidade em Estoque:
            </label>

            <input
                type="number"
                id="quantidade"
                name="quantidade"
                placeholder="Digite a quantidade"
                required
            >


            <label for="descricao">
                Descrição do Produto:
            </label>

            <input
                type="text"
                id="descricao"
                name="descricao"
                placeholder="Digite a descrição do Produto"
                required
            >


            <label for="fornecedor_id">
                Fornecedor:
            </label>


            <select
                id="fornecedor_id"
                name="fornecedor_id"
                required
            >

                <option value="">
                    Selecione um fornecedor
                </option>


                <?php foreach ($fornecedores as $fornecedor): ?>

                    <option
                        value="<?= $fornecedor['id'] ?>"
                    >

                        <?= htmlspecialchars($fornecedor['nome']) ?>

                    </option>

                <?php endforeach; ?>

            </select>


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
                Produtos cadastrados
            </h2>


            <div id="produtos"></div>

        </section>


    </section>

</main>


<script src="../js/produtos.js"></script>


<?php include __DIR__ . '/../components/footer.php'; ?>