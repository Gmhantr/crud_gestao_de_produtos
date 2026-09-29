<link rel="stylesheet" href="../styles/login.css">
<link rel="stylesheet" href="../styles/autenticacao.css">



<?php
$mensagem = $_GET["mensagem"] ?? "";
$css = $_GET["css"] ?? "";
?>


<div id="container-login">

    <form class="login" method="POST" action="../php/login_.php">

        <h1>Entrar</h1>

        <p>
            Entre para acessar a Ana Neri Materiais
        </p>

        <label for="email">
            E-mail
        </label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="Digite seu e-mail"
        >

        <label for="senha">
            Senha
        </label>

        <input
            type="password"
            id="senha"
            name="senha"
            placeholder="Digite sua senha"
        >
            <?php if ($mensagem): ?>
            <div class="<?= $css ?>">
            <?= $mensagem ?>
            </div>
            <?php endif; ?>

        <button type="submit">
            Entrar
        </button>

        <span class="cadastro-link">
            Ainda não tem uma conta?
            <a href="cadastro.php">Criar conta</a>
        </span>

    </form>

</div>

