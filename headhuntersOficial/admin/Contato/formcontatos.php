<?php
session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {

    ?>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    </head>

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="../menu.php">Home</a>
                <a class="navbar-brand" href="../Cliente/select.php">Cliente</a>
                <a class="navbar-brand" href="../Empresa/select.php">Empresa</a>
                <a class="navbar-brand" href="../Video/select.php">Video</a>
                <a class="navbar-brand" href="../Contato/select.php">Contato</a>
                <a class="navbar-brand" href="../Categoria/select.php">Categoria</a>
                <a class="navbar-brand" href="../cadastro.php">Cadastrar administrador</a>
                <a class="navbar-brand"  href="?go=sair" onClick= "return confirm('Você deseja sair?')">Sair</a>
            </nav>
        </header>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <body>
        <section class="row">
            <div class="container">        
                <form action="Insert.php" method="post" name="Contato">

                    <label>Assunto</label>
                    <input class="form-control" name="assunto" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>

                    <label>E-Mail:</label>
                    <input class="form-control" name="email" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>

                    <label>Mensagem:</label>
                    <textarea class="form-control" name="msg" rows="10" cols="100"></textarea>           
                    <p>&nbsp;</p>

                    <select class="form-control" name="tipo">
                        <option value="Empresa">Empresa</option>
                        <option value="Cliente">Cliente</option>
                        <option value="Sem conta">Sem conta</option>
                    </select>                
                    <p>&nbsp;</p>

                    <center>
                        <input name="btncadastrar" type="submit" value="Cadastrar" class="btn-lg btn-primary" />
                    </center>

                </form>
                <a href="select.php"><button class="btn-lg btn-primary text-white">Voltar</button></a>

            </div>
        </section>
    </body>
</html>

<?php



  
}

if (@$_GET['go'] == 'sair') {
    unset($_SESSION['adm_id']);
    echo "<script>window.location=\"../index.php\";</script>";
}
?>