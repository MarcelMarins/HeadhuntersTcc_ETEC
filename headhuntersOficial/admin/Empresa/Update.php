<?php
include '../../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {

    $emp_id = $_GET['emp_id'];

    if (isset($_POST['alterar'])) {

        $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_DEFAULT);
        $representante = filter_input(INPUT_POST, 'representante', FILTER_DEFAULT);
        $razao = filter_input(INPUT_POST, 'razao', FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
        $estado = filter_input(INPUT_POST, 'estado', FILTER_DEFAULT);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);

        $sql_code = "UPDATE empresa SET emp_cnpj = '$cnpj', emp_representante = '$representante', emp_razao = '$razao', emp_email = '$email', emp_senha = '$senha', emp_estado = '$estado', emp_cidade = '$cidade' WHERE emp_id = " . $emp_id;

        if ($pdo->query($sql_code)) {
            echo "<script>alert('A empresa foi alterada com sucesso!');window.location=\"select.php\";</script>";
        } else {
            echo "<script>alert('Dados incorretos');window.location=\"select.php\";</script>";
        }
    }


    $sql = "SELECT * FROM empresa WHERE emp_id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(array(':id' => $emp_id));
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    extract($row);


    $idEstado = $row['emp_estado'];
    $idCidade = $row['emp_cidade'];


    $sth3 = $pdo->prepare("select * from estado where est_id = '$idEstado' ");
    $sth3->execute();
    $estado_emp = $sth3->fetch(PDO::FETCH_ASSOC);
    extract($estado_emp);



    $sth4 = $pdo->prepare("select * from cidade where cid_id = '$idCidade'");
    $sth4->execute();
    $cidade_emp = $sth4->fetch(PDO::FETCH_ASSOC);
    extract($cidade_emp);
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
                    <form action="Update.php?emp_id=<?= $row['emp_id'] ?>" method="post" name="Contato" enctype="multipart/form-data">


                        <label>CNPJ</label>
                        <input class="form-control" placeholder="00.000.000/0000-00" name="cnpj" type="text" size="100" maxlength="18" value="<?= $row['emp_cnpj'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Represetante</label>
                        <input class="form-control" name="representante" type="text" size="100" maxlength="30" value="<?= $row['emp_representante'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Razão</label>
                        <input class="form-control" name="razao" type="text" size="100" maxlength="30" value="<?= $row['emp_razao'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  size="100" maxlength="30" value="<?= $row['emp_email'] ?>"/>
                        <p>&nbsp;</p>
                        <label>senha</label>
                        <input class="form-control" name="senha" type="password" size="100" maxlength="30" value="<?= $row['emp_senha'] ?>"/>
                        <p>&nbsp;</p>
                        <label>Estado</label>

                        <select class="form-control" id="estado" name="estado" class="borda" > 

                            <option value="<?= $estado_emp['est_id'] ?>" ><?= $estado_emp['est_uf'] ?> </option> 
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
                            <option value="<?= $cidade_emp['cid_id'] ?>"><?= $cidade_emp['cid_nome'] ?></option>

                        </select>
                        <p>&nbsp;</p>


                        <center>
                            <input name="alterar" type="submit" value="Alterar" class="btn-lg btn-primary" />
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