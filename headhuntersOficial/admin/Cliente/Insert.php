<?php
include '../../php/conexao2.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
$data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
$celular = filter_input(INPUT_POST, 'celular', FILTER_DEFAULT);
$estado = filter_input(INPUT_POST, 'estado', FILTER_DEFAULT);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
$genero = filter_input(INPUT_POST, 'genero', FILTER_DEFAULT);
if (isset($_FILES['imagem'])) {

    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novo_nome = md5(time()) . $extensao;

    $diretorio = "../../img/users/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

    $dataForm = implode("-", array_reverse(explode("/", $data)));
    
    $cpf1 = str_replace("-", "", $cpf);
    $cpfForm = str_replace(".", "", $cpf1);

    $sql_code = "INSERT INTO cliente (cli_id,cli_nome,cli_email,cli_senha,cli_cpf,cli_data_nasc,cli_celular,cli_id_estado,cli_id_cidade,cli_id_genero,cli_img) VALUES (NULL, '$nome','$email','$senha','$cpfForm','$dataForm','$celular','$estado','$cidade','$genero','$novo_nome')";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O cliente foi cadastrado com sucesso!');window.location=\"select.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"formusuario.php\";</script>";
    }
}
?>