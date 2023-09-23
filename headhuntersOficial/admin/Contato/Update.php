<?php
include_once("../../php/conexao2.php");

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {

$con_id = $_GET['con_id'];

if (isset($_POST['alterar'])) {

    $assunto = filter_input(INPUT_POST, 'assunto', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    $mensagem = filter_input(INPUT_POST, 'msg', FILTER_DEFAULT);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
    
    $sql_code = "UPDATE contato SET con_assunto = '$assunto', con_mensagem = '$mensagem', con_email = '$email', con_tipousuario = '$tipo' WHERE con_id = " . $con_id;
    //UPDATE contato SET con_mensagem = 'teste testeeee' WHERE con_id = 24;
    if ($pdo->query($sql_code)) {
        echo "<script>alert('O contato foi alterado com sucesso!');window.location=\"select.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"select.php\";</script>";
    }
}


$sql = "SELECT * FROM contato WHERE con_id = :id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' => $con_id));
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
                <form action="Update.php?con_id=<?= $row['con_id'] ?>" method="post" name="Contato">

                    <label>Assunto</label>
                    <input class="form-control" name="assunto" type="text" size="255" value="<?= $row['con_assunto'] ?>" maxlength="30" />
                    <p>&nbsp;</p>

                    <label>E-Mail:</label>
                    <input class="form-control" name="email" type="text" size="255" value="<?= $row['con_email'] ?>" maxlength="30" />
                    <p>&nbsp;</p>

                    <label>Mensagem:</label>
                    <textarea class="form-control" name="msg" rows="10" cols="255" ><?= $row['con_mensagem'] ?></textarea>           
                    <p>&nbsp;</p>


                    <label>Tipo de usuário:</label>
                    <select  class="form-control" name="tipo" >  
                        <option value="<?= $row['con_tipousuario'] ?>"></option>
                        <option value="Empresa">Empresa</option>
                        <option value="Cliente">Cliente</option>
                        <option value="Sem conta">Sem conta</option>
                    </select>                
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