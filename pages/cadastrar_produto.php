<?php include __DIR__  . '/../components/nav.php'; ?>
<?php include __DIR__ . '/../components/admin.php'?>     


<link rel='stylesheet' href='../styles/admin.css'>
<link rel="stylesheet" href="../index.css">
<link rel="stylesheet" href="../styles/nav.css">
<link rel="stylesheet" href="../styles/cadastro_fornecedor_produtos.css">
<link rel="stylesheet" href="../styles/footer.css">

<main id="cadastro_fp">
    

    <form id="form-fp" method="GET">
        <h1>Cadastro de Produto</h1>
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome do Produto">

        <label for="codigo">Código do Produto:</label>
        <input type="text" id="codigo" name="codigo" placeholder="Digite o código do Produto">

        <label for="preco">Preço do Produto:</label>
        <input type="number" id="preco" name="preco" placeholder="Digite o preço do Produto" step="0.01">

        <label for="quantidade">Quantidade em Estoque:</label>
        <input type="number" id="quantidade" name="quantidade" placeholder="Digite a quantidade">

        <label for="descricao">Descrição do Produto:</label>
        <input type="text" id="descricao" name="descricao" placeholder="Digite a descrição do Produto">

        <button type="submit" class="btn-fp">Cadastrar</button>
    </form>
</main>

    
    <?php include __DIR__  . '/../components/footer.php'; ?>