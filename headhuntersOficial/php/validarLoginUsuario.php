<?php

// session_start() Ã© por causa da sessÃ£o que serÃ¡ criada
session_start();

// Recebendo os dados do formulÃ¡rio
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

include './conexao2.php';

$sth = $pdo->prepare('select * from cliente where cli_email = :usuario and cli_senha = :senha');
$sth->bindValue(":usuario", $usuario);
$sth->bindValue(":senha", $senha);
$sth->execute();
$linha2 = $sth->fetch(PDO::FETCH_ASSOC);
extract($linha2);

$id_usu = $linha2['cli_id'];

if ($sth->rowCount() > 0):
    $linha = $sth->fetch(PDO::FETCH_ASSOC);
    extract($linha);
    $_SESSION['Login_usu']['cli_email'] = $usuario;
    $_SESSION['Login_usu']['cli_senha'] = $senha;
    $_SESSION['Login_usu_id']['cli_id'] = $id_usu;
    header('LOCATION:../pags_usu/index.php');
else:
    echo "<script>alert('Login ou Senha incorretos!');window.location=\"../pags/Login_usu.php\";</script>";
    
endif;


