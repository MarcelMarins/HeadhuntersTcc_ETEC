<?php
//Abrir conexão

include_once '../../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {

$resultado = $pdo->query("SELECT * FROM video ORDER BY vid_id ");
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

        <table width="105%" border="1">
            <tr bgcolor="lightblue">
                <td>Id</td>
                <td>Título</td> 
                <td>Subitítulo</td>
                <td>Escola</td> 
                <td>Professor Orientador</td>
                <td>Categoria</td> 
                <td>Equipe</td> 
                <td>Descrição</td>
                <td>Usuario</td> 
                <td>Data de Envio</td> 
                <td>Link</td> 
                <td>Thumbnail</td> 

            </tr>
            <?php
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['vid_id'] . "</td>";
                echo "<td>" . $row['vid_titulo'] . "</td>";
                echo "<td>" . $row['vid_subtit'] . "</td>";
                echo "<td>" . $row['vid_escola'] . "</td>";
                echo "<td >" . $row['vid_orientador'] . "</td>";
                $idCat = $row['vid_cat_id'];

                $sth3 = $pdo->prepare("select * from categoria where cat_id = '$idCat' ");
                $sth3->execute();
                $vid_cat = $sth3->fetch(PDO::FETCH_ASSOC);
                extract($vid_cat);


                echo "<td >" . $vid_cat['cat_nome'] . "</td>";
                echo "<td>" . $row['vid_equipe'] . "</td>";
                echo "<td>" . $row['vid_descricao'] . "</td>";
                $idCli = $row['vid_cli_id'];

                $sth4 = $pdo->prepare("select * from cliente where cli_id = '$idCli' ");
                $sth4->execute();
                $vid_cli = $sth4->fetch(PDO::FETCH_ASSOC);
                extract($vid_cli);

                echo "<td>" . $vid_cli['cli_nome'] . "</td>";
                echo "<td>" . $row['vid_dataenvio'] . "</td>";
                echo "<td>" . $row['vid_linkyt'] . "</td>";
                echo "<td>   <a href=\"../../img/thumb/$row[vid_imagem]\">Ver thumbnail</a></td>";

                echo "<td><a href=\"Update.php?vid_id=$row[vid_id]\">&nbsp; Editar &nbsp;</a></td>
                        <td><a href=\"Delete.php?vid_id=$row[vid_id]\" onClick=\" return confirm('Você deseja excluir os dados?')\">&nbsp; Excluir &nbsp;</a></td>";
            }
            ?>
        </table>
        <p>&nbsp;</p>
        <a href="formvideo.php"><input value="+" type="button" class="btn-sm btn-primary"/></a>

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