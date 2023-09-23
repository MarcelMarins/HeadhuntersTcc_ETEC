<?php
include '../../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {

$vid_id = $_GET['vid_id'];

if (isset($_POST['alterar'])) {

    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_DEFAULT);
    $subtitulo = filter_input(INPUT_POST, 'subtitulo', FILTER_DEFAULT);
    $escola = filter_input(INPUT_POST, 'escola', FILTER_DEFAULT);
    $orientador = filter_input(INPUT_POST, 'orientador', FILTER_DEFAULT);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_DEFAULT);
    $equipe = filter_input(INPUT_POST, 'equipe', FILTER_DEFAULT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
    $cliente = filter_input(INPUT_POST, 'cliente', FILTER_DEFAULT);
    $link = filter_input(INPUT_POST, 'link', FILTER_DEFAULT);

    $sql_code = "UPDATE video SET vid_titulo = '$titulo', vid_subtit = '$subtitulo', vid_escola = '$escola', vid_orientador = '$orientador', vid_cat_id = '$categoria', vid_equipe = '$equipe', vid_descricao = '$descricao', vid_cli_id = '$cliente', vid_linkyt = '$link' WHERE vid_id = " . $vid_id;
    //UPDATE contato SET con_mensagem = 'teste testeeee' WHERE con_id = 24;
    if ($pdo->query($sql_code)) {
        echo "<script>alert('O vídeo foi alterado com sucesso!');window.location=\"select.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"select.php\";</script>";
    }
}


$sql = "SELECT * FROM video WHERE vid_id = :id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' => $vid_id));
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
    <body>
        <section class="row">
            <div class="container">        
                <form action="Update.php?vid_id=<?= $row['vid_id'] ?>" method="post" name="Contato" enctype="multipart/form-data">

                    <label>Título</label>
                    <input class="form-control" name="titulo" type="text" size="100" maxlength="30" value="<?= $row['vid_titulo'] ?>" />
                    <p>&nbsp;</p>
                    <label>Subtítulo</label>
                    <input class="form-control" name="subtitulo" type="text" size="100" maxlength="30" value="<?= $row['vid_subtit'] ?>"/>
                    <p>&nbsp;</p>
                    <label>Escola</label>
                    <input class="form-control" name="escola" type="text" size="100" maxlength="30" value="<?= $row['vid_escola'] ?>"/>
                    <p>&nbsp;</p>
                    <label>Professor Orientador</label>
                    <input class="form-control" name="orientador" type="text" size="100" maxlength="30" value="<?= $row['vid_orientador'] ?>"/>
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
                    <textarea class="form-control" name="equipe" rows="10" cols="100" /><?= $row['vid_equipe'] ?></textarea> 
                    <p>&nbsp;</p>
                    <label>Descrição</label>
                    <textarea class="form-control" name="descricao" rows="10" cols="100" ><?= $row['vid_descricao'] ?></textarea>   
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
                    <input class="form-control" name="link" type="text" size="100" maxlength="30" value="<?= $row['vid_linkyt'] ?>"/>
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