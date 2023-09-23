<?php
include '../../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {

    $cli_id = $_GET['cli_id'];

    if (isset($_POST['alterar'])) {

        $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
        $data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
        $celular = filter_input(INPUT_POST, 'celular', FILTER_DEFAULT);
        $estado = filter_input(INPUT_POST, 'estado', FILTER_DEFAULT);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_DEFAULT);

        $sql_code = "UPDATE cliente SET cli_nome = '$nome', cli_email = '$email', cli_senha = '$senha', cli_cpf = '$cpf', cli_data_nasc = '$data', cli_celular = '$celular', cli_id_estado = '$estado', cli_id_cidade = '$cidade', cli_id_genero = '$genero' WHERE cli_id = " . $cli_id;
        //UPDATE contato SET con_mensagem = 'teste testeeee' WHERE con_id = 24;
        if ($pdo->query($sql_code)) {
            echo "<script>alert('O cliente foi alterado com sucesso!');window.location=\"select.php\";</script>";
        } else {
            echo "<script>alert('Dados incorretos');window.location=\"select.php\";</script>";
        }
    }

    $sql = "SELECT * FROM cliente WHERE cli_id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(array(':id' => $cli_id));
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    extract($row);


    $idEstado = $row['cli_id_estado'];
    $idCidade = $row['cli_id_cidade'];
    $idGenero = $row['cli_id_genero'];


    $sth3 = $pdo->prepare("select * from estado where est_id = '$idEstado'");
    $sth3->execute();
    $estado_usu = $sth3->fetch(PDO::FETCH_ASSOC);
    extract($estado_usu);


    $sth4 = $pdo->prepare("select * from cidade where cid_id = '$idCidade'");
    $sth4->execute();
    $cidade_usu = $sth4->fetch(PDO::FETCH_ASSOC);
    extract($cidade_usu);

    $sth5 = $pdo->prepare("select * from genero where sexo_id = '$idGenero'");
    $sth5->execute();
    $genero_usu = $sth5->fetch(PDO::FETCH_ASSOC);
    extract($genero_usu);
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
                    <form action="Update.php?cli_id=<?= $row['cli_id'] ?>" method="post" name="Contato" enctype="multipart/form-data">

                        <label>Nome</label>
                        <input class="form-control" name="nome" type="text" size="100" maxlength="30" value="<?= $row['cli_nome'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  maxlength="45" size="100" value="<?= $row['cli_email'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Senha</label>
                        <input class="form-control" name="senha" type="password" size="100" maxlength="45" value="<?= $row['cli_senha'] ?>"/>
                        <p>&nbsp;</p>
                        <label>CPF</label>
                        <input class="form-control" placeholder="000.000.000-00" id="cpf" name="cpf" type="text" maxlength="14" size="100" value="<?= $row['cli_cpf'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Data de Nascimento</label>
                        <input class="form-control" name="data" type="date" size="100" maxlength="30" value="<?= $row['cli_data_nasc'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Celular</label>
                        <input class="form-control" placeholder="(00)00000-0000" id="celular" name="celular" type="text" size="100" maxlength="30" value="<?= $row['cli_celular'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Estado</label>



                        <select class="form-control" id="estado" name="estado" class="borda"> 

                          <option value="<?= $estado_usu['est_id'] ?>" ><?= $estado_usu['est_uf'] ?> </option>
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
                        <select  class="form-control" id="cidade" name="cidade">
                             <option value="<?= $cidade_usu['cid_id'] ?>"><?= $cidade_usu['cid_nome'] ?></option>


                        </select>
                        <p>&nbsp;</p>

                        <label>Gênero</label>
                        <select class="form-control" name="genero" > 

                            <option value="<?= $genero_usu['sexo_id'] ?>"><?= $genero_usu['sexo_opcao'] ?></option>
                            <?php
                            $select = $pdo->prepare("SELECT * FROM genero ORDER BY sexo_opcao");
                            $select->execute();
                            $fetchAll = $select->fetchAll();

                            foreach ($fetchAll as $sexo) {
                                echo '<option value= "' . $sexo['sexo_id'] . '">' . $sexo['sexo_opcao'] . '</option>';
                            };
                            ?>
                        </select>
                        <p>&nbsp;</p>



                        <p>&nbsp;</p>
                        <center>
                            <input name="alterar" type="submit" value="Alterar" class="btn-lg btn-primary" />
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