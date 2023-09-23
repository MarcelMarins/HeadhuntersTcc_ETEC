<?php
include_once("../../php/conexao2.php");

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {


    $cat_id = $_GET['cat_id'];

    if (isset($_POST['alterar'])) {

        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_DEFAULT);

        $sql_code = "UPDATE categoria SET cat_nome = '$categoria' WHERE cat_id = " . $cat_id;
        if ($pdo->query($sql_code)) {
            echo "<script>alert('A categoria foi alterada com sucesso!');window.location=\"select.php\";</script>";
        } else {
            echo "<script>alert('Dados incorretos');window.location=\"select.php\";</script>";
        }
    }


    $sql = "SELECT * FROM categoria WHERE cat_id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(array(':id' => $cat_id));
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    extract($row);
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
        <section class="row">
            <div class="container">        
                <form action="Update.php?cat_id=<?= $row['cat_id'] ?>" method="post" name="Contato">

                    <label>Categoria</label>
                    <input class="form-control" name="categoria" type="text" size="100" maxlength="30" value="<?= $row['cat_nome'] ?>"/>
                    <p>&nbsp;</p>

                    <center>
                        <input name="alterar" type="submit" value="Alterar" class="btn-lg btn-primary" />
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