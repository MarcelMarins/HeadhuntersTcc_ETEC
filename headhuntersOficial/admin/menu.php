<?php
include '../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"index.php\";</script>";
} else {
    ?>

<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
    </head>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Home</a>
            <a class="navbar-brand" href="Cliente/select.php">Cliente</a>
            <a class="navbar-brand" href="Empresa/select.php">Empresa</a>
            <a class="navbar-brand" href="Empresa/select.php">Video</a>
            <a class="navbar-brand" href="Contato/select.php">Contato</a>
            <a class="navbar-brand" href="Categoria/select.php">Categoria</a>
            <a class="navbar-brand" href="cadastro.php">Cadastrar administrador</a>
            <a class="navbar-brand"  href="?go=sair" onClick= "return confirm('Você deseja sair?')">Sair</a>
           
        </nav>
    </header>

    <body>
        <section class="row">
            <div class="container text-center">
                <br>
                <h2>Bem-vindo!</h2>

            </div>
        </section>
    </body>

</html>
<?php
}

if (@$_GET['go'] == 'sair') {
    unset($_SESSION['adm_id']);
    echo "<script>window.location=\"index.php\";</script>";
}

    ?>