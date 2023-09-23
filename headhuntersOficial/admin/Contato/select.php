<?php
//Abrir conexão

include_once '../../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {

$resultado = $pdo->query("SELECT * FROM contato ORDER BY con_id ");
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

        <div class="container">
            <table width="100%" border="1">
                <tr bgcolor="lightblue">
                    <td>Id</td>
                    <td>Assunto</td> 
                    <td>Mensagem</td>
                    <td>E-Mail</td>
                    <td>Data de envio</td>
                    <td>Tipo de usuário</td> 
                </tr>
                <?php
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['con_id'] . "</td>";
                    echo "<td>" . $row['con_assunto'] . "</td>";
                    echo "<td>" . $row['con_mensagem'] . "</td>";
                    echo "<td>" . $row['con_email'] . "</td>";
                    echo "<td>" . $row['con_datadeenvio'] . "</td>";
                    echo "<td>" . $row['con_tipousuario'] . "</td>";
                    echo "<td><a href=\"Update.php?con_id=$row[con_id]\">&nbsp; Editar &nbsp;</a></td>
	<td><a href=\"Delete.php?con_id=$row[con_id]\" onClick=\" return confirm('Você deseja excluir os dados?')\">&nbsp; Excluir &nbsp;</a></td>";
                }
                ?>
            </table>
            <p>&nbsp;</p>
            <a href="formcontatos.php"><input value="+" type="button" class="btn-sm btn-primary"/></a>
        </div>

 
    </body>
</html>

<?php



  
}

if (@$_GET['go'] == 'sair') {
    unset($_SESSION['adm_id']);
    echo "<script>window.location=\"../index.php\";</script>";
}
?>