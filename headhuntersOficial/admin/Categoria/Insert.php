<?php

include '../../php/conexao2.php';

$categoria1 = filter_input(INPUT_POST, 'categoria', FILTER_DEFAULT);


    

    $sql_code = "INSERT INTO categoria (cat_id,cat_nome) VALUES (NULL, '$categoria1')";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O contato foi enviado com sucesso!');window.location=\"select.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"select.php\";</script>";
    }
?>