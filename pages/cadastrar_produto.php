

<?php include __DIR__ . '/../components/nav.php'; ?>
<?php include __DIR__ . '/../components/admin.php'; ?>

<link rel="stylesheet" href="../styles/admin.css">
<link rel="stylesheet" href="../index.css">
<link rel="stylesheet" href="../styles/nav.css">
<link rel="stylesheet" href="../styles/cadastro_fornecedor_produtos.css">
<link rel="stylesheet" href="../styles/footer.css">
<link rel="stylesheet" href="../styles/autenticacao.css">

<?php

include __DIR__ . '/../php/conexao_.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$sql = $pdo->query("
    SELECT id, nome
    FROM fornecedores
    ORDER BY nome
");

$fornecedores = $sql->fetchAll(PDO::FETCH_ASSOC);


$mensagem = $_GET["mensagem"] ?? "";
$css = $_GET["css"] ?? "";


?>

<main id="cadastro_fp">

    <form id="form-fp" method="POST" action="../php/produtos_.php">

        <h1>Cadastro de Produto</h1>

        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome do Produto">

        <label for="codigo">Código do Produto:</label>
        <input type="text" id="codigo" name="codigo" placeholder="Digite o código do Produto">

        <label for="preco">Preço do Produto:</label>
        <input type="number" id="preco" name="preco" placeholder="Digite o preço do Produto" step="0.01" >

        <label for="quantidade">Quantidade em Estoque:</label>
        <input type="number" id="quantidade" name="quantidade" placeholder="Digite a quantidade">

        <label for="descricao">Descrição do Produto:</label>
        <input type="text" id="descricao" name="descricao" placeholder="Digite a descrição do Produto" >

        <label for="fornecedor_id">Fornecedor:</label>

        <select id="fornecedor_id" name="fornecedor_id">

            <option class="forn-produtos" value="">Selecione um fornecedor</option>

            <?php foreach ($fornecedores as $fornecedor): ?>

                <option value="<?= $fornecedor['id'] ?>">
                    <?= htmlspecialchars($fornecedor['nome']) ?>
                </option>

            <?php endforeach; ?>

        </select>

            <?php if ($mensagem): ?>
            <div class="<?= $css ?>">
            <?= $mensagem ?>
            </div>
            <?php endif; ?>

        <button type="submit" class="btn-fp">
            Cadastrar
        </button>

    </form>

</main>

<?php include __DIR__ . '/../components/footer.php'; ?>