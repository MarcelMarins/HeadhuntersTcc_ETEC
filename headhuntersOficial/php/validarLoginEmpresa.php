<?php
// session_start() Ã© por causa da sessÃ£o que serÃ¡ criada
session_start();

// Recebendo os dados do formulÃ¡rio
$usuario_emp = filter_input(INPUT_POST, 'usuario_emp', FILTER_DEFAULT);
$senha_emp = filter_input(INPUT_POST, 'senha_emp', FILTER_DEFAULT);

include './conexao2.php';

$sth = $pdo->prepare('select * from empresa where emp_email = :usuario_emp and emp_senha = :senha_emp');
$sth->bindValue(":usuario_emp", $usuario_emp);
$sth->bindValue(":senha_emp", $senha_emp);
$sth->execute();
$linha2 = $sth->fetch(PDO::FETCH_ASSOC);
extract($linha2);

$id_emp = $linha2['emp_id'];

if ($sth->rowCount() > 0):
    $linha = $sth->fetch(PDO::FETCH_ASSOC);
    extract($linha);
    $_SESSION['Login_Emp']['emp_email'] = $usuario_emp;
    $_SESSION['Login_Emp']['emp_senha'] = $senha_emp;
    $_SESSION['Login_Emp_id']['emp_senha'] = $id_emp;
    header('LOCATION:../pags_emp/index.php');
else:
    echo "<script>alert('Login ou Senha incorretos!');window.location=\"../pags/Login_emp.php\";</script>";
    
endif;




