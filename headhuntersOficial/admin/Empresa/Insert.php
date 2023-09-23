<?php
include '../../php/conexao2.php';

$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_DEFAULT);
$representante = filter_input(INPUT_POST, 'representante', FILTER_DEFAULT);
$razao = filter_input(INPUT_POST, 'razao', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$estado = filter_input(INPUT_POST, 'estado', FILTER_DEFAULT);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
if (isset($_FILES['imagem'])) {

    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novo_nome = md5(time()) . $extensao;

    $diretorio = "../../img/users/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

    $sql_code = "INSERT INTO empresa (emp_id,emp_cnpj,emp_representante,emp_razao,emp_email,emp_senha,emp_estado,emp_cidade,emp_imagem) VALUES (NULL, '$cnpj','$representante','$razao','$email','$senha','$estado','$cidade','$novo_nome')";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O contato foi enviado com sucesso!');window.location=\"select.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"formempresa.php\";</script>";
    }
}
?>