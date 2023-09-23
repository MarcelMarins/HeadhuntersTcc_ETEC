<?php

include "conexao2.php";
$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
$login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

    

    $sql_code = "INSERT INTO admin (adm_id, adm_nome, adm_login, adm_senha) VALUES (NULL, '$nome', '$login', '$senha')";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('Você foi cadastrado com sucesso!');window.location=\"../admin/index.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"../pags/contato.php\";</script>";
    }
?>