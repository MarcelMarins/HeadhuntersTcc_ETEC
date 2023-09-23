<?php

include '../../php/conexao2.php';

$assunto = filter_input(INPUT_POST, 'assunto', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$mensagem = filter_input(INPUT_POST, 'msg', FILTER_DEFAULT);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
$data = date('d/m/20y');


    

    $sql_code = "INSERT INTO contato (con_id, con_assunto, con_mensagem, con_datadeenvio, con_email, con_tipousuario) VALUES (NULL, '$assunto', '$mensagem', '$data', '$email', '$tipo')";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O contato foi enviado com sucesso!');window.location=\"formcontatos.html\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"formcontatos.html\";</script>";
    }
?>