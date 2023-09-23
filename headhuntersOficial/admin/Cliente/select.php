<?php
//Abrir conexão

include_once '../../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {

    $resultado = $pdo->query("SELECT * FROM cliente ORDER BY cli_id ");
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

            <table width="115%" border="1">
                <tr bgcolor="lightblue">
                    <td>Id</td>
                    <td>Nome</td> 
                    <td>Email</td>
                    <td>Senha</td> 
                    <td>CPF</td>
                    <td>Data de Nascimento</td> 
                    <td>Celular</td> 
                    <td>Estado</td>
                    <td>Cidade</td> 
                    <td>Gênero</td> 
                    <td>Foto de perfil</td> 



                </tr>
                <?php
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {

                    echo "<tr>";
                    echo "<td>" . $row['cli_id'] . "</td>";
                    echo "<td>" . $row['cli_nome'] . "</td>";
                    echo "<td>" . $row['cli_email'] . "</td>";
                    echo "<td>" . $row['cli_senha'] . "</td>";
                    echo "<td >" . $row['cli_cpf'] . "</td>";
                    echo "<td>" . $row['cli_data_nasc'] . "</td>";
                    echo "<td>" . $row['cli_celular'] . "</td>";
                    $idEstado = $row['cli_id_estado'];
                    $idCidade = $row['cli_id_cidade'];
                    $idGenero = $row['cli_id_genero'];


                    $sth3 = $pdo->prepare("select * from estado where est_id = '$idEstado' ");
                    $sth3->execute();
                    $estado_emp3 = $sth3->fetch(PDO::FETCH_ASSOC);
                    extract($estado_emp3);



                    $sth4 = $pdo->prepare("select * from cidade where cid_id = '$idCidade'");
                    $sth4->execute();
                    $cidade_emp3 = $sth4->fetch(PDO::FETCH_ASSOC);
                    extract($cidade_emp3);


                    $sth5 = $pdo->prepare("select * from genero where sexo_id = '$idGenero'");
                    $sth5->execute();
                    $genero_usu3 = $sth5->fetch(PDO::FETCH_ASSOC);
                    extract($genero_usu3);


                    echo "<td >" . $estado_emp3['est_uf'] . "</td>";
                    echo "<td>" . $cidade_emp3['cid_nome'] . "</td>";
                    echo "<td>" . $genero_usu3['sexo_opcao'] . "</td>";
                    echo "<td>   <a href=\"../../img/users/$row[cli_img]\">Ver foto de prefil</a></td>";


                    echo "<td><a href=\"Update.php?cli_id=$row[cli_id]\">&nbsp; Editar &nbsp;</a></td>
                        <td><a href=\"Delete.php?cli_id=$row[cli_id]\" onClick=\" return confirm('Você deseja excluir os dados?')\">&nbsp; Excluir &nbsp;</a>  </td>";
                }
                ?>
            </table>
            <p>&nbsp;</p>
            <a href="formusuario.php"><input value="+" type="button" class="btn-sm btn-primary"/></a>

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