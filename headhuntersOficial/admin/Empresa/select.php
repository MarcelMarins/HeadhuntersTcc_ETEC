<?php
//Abrir conexão

include_once '../../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"../index.php\";</script>";
} else {
    
$resultado = $pdo->query("SELECT * FROM empresa ORDER BY emp_id ");
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
                <td>Cnpj</td> 
                <td>Representante</td>
                <td>Razão</td> 
                <td>Email</td>
                <td>Senha</td> 
                <td>Estado</td>
                <td>Cidade</td> 
                <td>Foto de perfil</td> 


            </tr>
            <?php
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {

                echo "<tr>";
                echo "<td>" . $row['emp_id'] . "</td>";
                echo "<td>" . $row['emp_cnpj'] . "</td>";
                echo "<td>" . $row['emp_representante'] . "</td>";
                echo "<td>" . $row['emp_razao'] . "</td>";
                echo "<td >" . $row['emp_email'] . "</td>";
                echo "<td>" . $row['emp_senha'] . "</td>";
                $idEstado = $row['emp_estado'];
                $idCidade = $row['emp_cidade'];


                $sth3 = $pdo->prepare("select * from estado where est_id = '$idEstado' ");
                $sth3->execute();
                $estado_emp3 = $sth3->fetch(PDO::FETCH_ASSOC);
                extract($estado_emp3);



                $sth4 = $pdo->prepare("select * from cidade where cid_id = '$idCidade'");
                $sth4->execute();
                $cidade_emp3 = $sth4->fetch(PDO::FETCH_ASSOC);
                extract($cidade_emp3);


                echo "<td >" . $estado_emp3['est_uf'] . "</td>";
                echo "<td>" . $cidade_emp3['cid_nome'] . "</td>";
                echo "<td>   <a href=\"../../img/users/$row[emp_imagem]\">Ver foto de perfil</a></td>";



                echo "<td><a href=\"Update.php?emp_id=$row[emp_id]\">&nbsp; Editar &nbsp;</a></td>
                        <td><a href=\"Delete.php?emp_id=$row[emp_id]\" onClick=\" return confirm('Você deseja excluir os dados?')\">&nbsp; Excluir &nbsp;</a></td>";
            }
            ?>
        </table>
        <p>&nbsp;</p>
        <a href="formempresa.php"><input value="+" type="button" class="btn-sm btn-primary"/></a>

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