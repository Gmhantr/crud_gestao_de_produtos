<?php include __DIR__  . '/../components/nav.php'; ?>
<?php include __DIR__ . '/../components/admin.php'?>      

<link rel='stylesheet' href='../styles/admin.css'>
<link rel="stylesheet" href="../index.css">
<link rel="stylesheet" href="../styles/nav.css">
<link rel="stylesheet" href="../styles/cadastro_fornecedor_produtos.css">
<link rel="stylesheet" href="../styles/footer.css">
<link rel="stylesheet" href="../styles/autenticacao.css">

<?php
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}


$mensagem = $_GET["mensagem"] ?? "";
$css = $_GET["css"] ?? "";
?>


<main id="cadastro_fp" >


    <form id="form-fp" method="POST" action="../php/fornecedores_.php">
        <h1>Cadastro de Fornecedor</h1>
        <label for="nome">Nome do Fornecedor:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome do Fornecedor">

        <label for="cnpj">CNPJ do Fornecedor:</label>
        <input type="text" id="cnpj" name="cnpj" placeholder="Digite o CNPJ do Fornecedor">

        <label for="telefone">Telefone do Fornecedor:</label>
        <input type="tel" id="telefone" name="telefone" placeholder="Digite o telefone do Fornecedor">

        <label for="email">E-mail do Fornecedor:</label>
        <input type="email" id="email" name="email" placeholder="Digite o e-mail do Fornecedor">

        <label for="endereco">Endereço do Fornecedor:</label>
        <input type="text" id="endereco" name="endereco" placeholder="Digite o endereço do Fornecedor">


            <?php if ($mensagem): ?>
            <div class="<?= $css ?>">
            <?= $mensagem ?>
            </div>
            <?php endif; ?>

        <button type="submit" class="btn-fp">Cadastrar</button>
    </form>
</main>

    <?php include __DIR__  . '/../components/footer.php'; ?>