<?php
include '../../php/conexao2.php';

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
                <form action="Insert.php" method="post" name="Contato" enctype="multipart/form-data">


                    <label>Título</label>
                    <input class="form-control" name="titulo" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>
                    <label>Subtítulo</label>
                    <input class="form-control" name="subtitulo" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>
                    <label>Escola</label>
                    <input class="form-control" name="escola" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>
                    <label>Professor Orientador</label>
                    <input class="form-control" name="orientador" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>
                    <label>Categoria</label>

                    <select class="form-control" name="categoria" > 

                        <option value="">Escolha a categoria</option>
                        <?php
                        $select = $pdo->prepare("SELECT * FROM categoria ORDER BY cat_nome");
                        $select->execute();
                        $fetchAll = $select->fetchAll();

                        foreach ($fetchAll as $cat) {
                            echo '<option value= "' . $cat['cat_id'] . '">' . $cat['cat_nome'] . '</option>';
                        };
                        ?>
                    </select>


                    <p>&nbsp;</p>
                    <label>Equipe</label>
                    <textarea class="form-control" name="equipe" rows="10" cols="100"/></textarea> 
                    <p>&nbsp;</p>
                    <label>Descrição</label>
                    <textarea class="form-control" name="descricao" rows="10" cols="100"></textarea>   
                    <p>&nbsp;</p>
                    <label>Usuario</label>

                    <select class="form-control" name="cliente" > 

                        <option value="">Escolha o usuario</option>
                        <?php
                        $select = $pdo->prepare("SELECT * FROM cliente ORDER BY cli_nome");
                        $select->execute();
                        $fetchAll = $select->fetchAll();

                        foreach ($fetchAll as $cat) {
                            echo '<option value= "' . $cat['cli_id'] . '">' . $cat['cli_nome'] . '</option>';
                        };
                        ?>
                    </select>



                    <p>&nbsp;</p>



                    <label>Link do Vídeo</label>
                    <input class="form-control" name="link" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>

                    <label>Thumnail</label>
                    <input type="file" name="imagem" accept="image/jpg, image/jpeg, image/png" required>

                    <p>&nbsp;</p>

                    <center>
                        <input name="btncadastrar" type="submit" value="Cadastrar" class="btn-lg btn-primary" />
                    </center>

                </form>
                <a href="select.php"><button class="btn-lg btn-primary text-white">Voltar</button></a>

            </div>
        </section>

        <script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/carregarCidades.js" type="text/javascript"></script>
    </body>
</html>

  <?php
}

if (@$_GET['go'] == 'sair') {
    unset($_SESSION['adm_id']);
    echo "<script>window.location=\"../index.php\";</script>";
}
?>