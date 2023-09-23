<?php

session_start();

$adm_login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
$adm_senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

include 'conexao2.php';

$sth = $pdo->prepare('SELECT * FROM admin WHERE adm_login = :adm_login AND adm_senha = :adm_senha');
$sth->bindValue(":adm_login", $adm_login);
$sth->bindValue(":adm_senha", $adm_senha);
$sth->execute();
$var = $sth->fetch(PDO::FETCH_ASSOC);
extract($var);

$adm_id = $var['adm_id'];

if ($sth->rowCount() > 0):
    $linha = $sth->fetch(PDO::FETCH_ASSOC);
    extract($linha);
    $_SESSION['Loginadm_login']['adm_login'] = $adm_login;
    $_SESSION['Loginadm_senha']['adm_senha'] = $adm_senha;
    $_SESSION['adm_id']['adm_id'] = $adm_id;
    header('LOCATION:../admin/menu.php');
else:
   echo "<script>alert('Login ou Senha incorretos!');window.location=\"../admin/index.php\";</script>";
endif;




