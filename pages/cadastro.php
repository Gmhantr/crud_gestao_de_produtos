
<link rel="stylesheet" href="../styles/cadastro.css">

<link rel="stylesheet" href="../styles/autenticacao.css">

<link rel="stylesheet" href="../index.css">


<?php
$mensagem = $_GET["mensagem"] ?? "";
$css = $_GET["css"] ?? "";
?>


<div id="container-cadastro">

    <form class="cadastro" method="POST" action="../php/cadastro_.php">

        <h1>Criar conta</h1>

        <p>
            Cadastre-se para acessar a Ana Neri Materiais
        </p>

        <label for="nome">
            Nome
        </label>

        <input 
            type="text" 
            id="nome" 
            name="nome" 
            placeholder="Digite seu nome"
            required
        >

        <label for="email">
            E-mail
        </label>

        <input 
            type="email" 
            id="email" 
            name="email" 
            placeholder="Digite seu e-mail"
            required
        >

        <label for="senha">
            Senha
        </label>

        <input 
            type="password" 
            id="senha" 
            name="senha" 
            placeholder="Digite sua senha"
            required
        >

        <label for="confirmar-senha">
            Confirmar senha
        </label>

        <input 
            type="password" 
            id="confirmar-senha" 
            name="confirmar-senha" 
            placeholder="Digite a senha novamente"
            required
        >


            <?php if ($mensagem): ?>
            <div class="<?= $css ?>">
            <?= $mensagem ?>
            </div>
            <?php endif; ?>

        <button type="submit">
            Criar conta
        </button>

        <span class="login-link">
            Já tem uma conta?
            <a href="login.php">Entrar</a>
        </span>

    </form>

</div>

