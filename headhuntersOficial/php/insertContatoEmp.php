<?php

include "conexao2.php";
$data = date('20y-m-d');
$assunto = filter_input(INPUT_POST, 'assunto', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$mensagem = filter_input(INPUT_POST, 'msg', FILTER_DEFAULT);

    

    $sql_code = "INSERT INTO contato (con_id, con_assunto, con_mensagem, con_datadeenvio, con_email, con_tipousuario) VALUES (NULL, '$assunto', '$mensagem', '$data', '$email', 'Empresa')";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O contato foi enviado com sucesso!');window.location=\"../pags_emp/contato.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"../pags_emp/contato.php\";</script>";
    }
?>