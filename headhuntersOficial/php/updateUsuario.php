<?php

include_once("conexao2.php");

session_start();



$sth30 = $pdo->prepare('select * from cliente where cli_email = :session and cli_senha = :session1');
$sth30->bindValue(":session", $_SESSION['Login_usu']['cli_email']);
$sth30->bindValue(":session1", $_SESSION['Login_usu']['cli_senha']);
$sth30->execute();
$linha = $sth30->fetch(PDO::FETCH_ASSOC);
extract($linha);


$Email_confirm = $linha['cli_email'];
$Senha_confirm = $linha['cli_senha'];




include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'cli_nome', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'cli_email', FILTER_DEFAULT);
$senha1 = filter_input(INPUT_POST, 'cli_senha', FILTER_DEFAULT);
$cpf = filter_input(INPUT_POST, 'cli_cpf', FILTER_DEFAULT);
$data = filter_input(INPUT_POST, 'cli_data_nasc', FILTER_DEFAULT);
$celular = filter_input(INPUT_POST, 'cli_celular', FILTER_DEFAULT);
$estado1 = filter_input(INPUT_POST, 'cli_id_estado', FILTER_DEFAULT);
$cidade1 = filter_input(INPUT_POST, 'cli_id_cidade', FILTER_DEFAULT);
$genero = filter_input(INPUT_POST, 'cli_id_genero', FILTER_DEFAULT);

function validaCPF($cpf) {


    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    if (strlen($cpf) != 11) {
        return false;
    }
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
}

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

if (validaCPF($cpf) == true) {

    $cpf1 = str_replace("-", "", $cpf);
    $cpfForm = str_replace(".", "", $cpf1);

    $dataForm = implode("-", array_reverse(explode("/", $data)));

    $celu1 = str_replace("-", "", $celular);
    $celu2 = str_replace("(", "", $celu1);
    $celuForm = str_replace(")", "", $celu2);


    $result_usuario = "UPDATE cliente SET cli_nome='$nome', cli_email='$email',cli_senha='$senha1',cli_cpf='$cpfForm',cli_data_nasc='$dataForm',cli_celular='$celuForm',cli_id_estado='$estado1' ,cli_id_cidade='$cidade1' ,cli_id_genero='$genero'   WHERE cli_email='$Email_confirm' and cli_senha='$Senha_confirm' ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_affected_rows($conn)) {

        echo "<script>alert('Perfil atualizado com sucesso');window.location=\"../pags_usu/Perfil_usu.php\";</script> ";
    } else {

        echo "<script>alert('Erro ao atualizar perfil');window.location=\"../pags_usu/Perfil_usu.php\";</script> ";
    }
} else if (validaCPF($cpf) == false) {

    echo "<script>alert('CPF Invalido!');window.location=\"../pags/Cadastro_usu.php\";</script> ";
}
?>