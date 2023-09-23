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


                    <label>CNPJ</label>
                    <input class="form-control" placeholder="00.000.000/0000-00" name="cnpj" type="text" size="100" maxlength="18" />
                    <p>&nbsp;</p>
                    <label>Represetante</label>
                    <input class="form-control" name="representante" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>
                    <label>Razão</label>
                    <input class="form-control" name="razao" type="text" size="100" maxlength="30" />
                    <p>&nbsp;</p>
                    <label>Email</label>
                    <input class="form-control" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  size="100" maxlength="30" />
                    <p>&nbsp;</p>
                    <label>senha</label>
                    <input class="form-control" name="senha" type="password" size="100" maxlength="30" />
                    <p>&nbsp;</p>
                    <label>Estado</label>

                    <select class="form-control" id="estado" name="estado" class="borda" > 

                        <option >Selecione um Estado</option>
                        <?php
                        $select = $pdo->prepare("SELECT * FROM estado ORDER BY est_uf ");
                        $select->execute();
                        $fetchAll = $select->fetchAll();
                        foreach ($fetchAll as $estado) {
                            echo '<option value= "' . $estado['est_id'] . '">' . $estado['est_uf'] . '</option>';
                        };
                        ?>

                    </select>


                    <p>&nbsp;</p>
                    <label>Cidade</label>
                    <select  class="form-control" id="cidade" name="cidade"  >
                        <option value="">Escolha uma cidade</option>

                    </select>
                    <p>&nbsp;</p>

                    <label>Foto de perfil</label>
                    <input type="file" name="imagem" accept="image/jpg, image/jpeg, image/png" required>

                    <p>&nbsp;</p>

                    <center>
                        <input name="btncadastrar" type="submit" value="Cadastrar" class="btn-lg btn-primary" />
                    </center>

                </form>
              
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