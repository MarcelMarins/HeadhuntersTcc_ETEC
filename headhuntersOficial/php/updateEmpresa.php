<?php

include_once("conexao2.php");
session_start();



$sth30 = $pdo->prepare('select * from empresa where emp_email = :session and emp_senha = :session1');
$sth30->bindValue(":session", $_SESSION['Login_Emp']['emp_email']);
$sth30->bindValue(":session1", $_SESSION['Login_Emp']['emp_senha']);
$sth30->execute();
$linha = $sth30->fetch(PDO::FETCH_ASSOC);
extract($linha);


$Email_confirm = $linha['emp_email'];
$Senha_confirm = $linha['emp_senha'];




include_once("conexao.php");

$cnpj_up = filter_input(INPUT_POST, 'emp_cnpj', FILTER_DEFAULT);
$razaoEmp_up = filter_input(INPUT_POST, 'emp_razao', FILTER_DEFAULT);
$representanteEmp_up = filter_input(INPUT_POST, 'emp_representante', FILTER_DEFAULT);
$emailEmp_up = filter_input(INPUT_POST, 'emp_email', FILTER_DEFAULT);
$senhaEmp_up = filter_input(INPUT_POST, 'emp_senha', FILTER_DEFAULT);
$estadoEmp_up = filter_input(INPUT_POST, 'emp_estado', FILTER_DEFAULT);
$cidadeEmp_up = filter_input(INPUT_POST, 'emp_cidade', FILTER_DEFAULT);

/*
$sth3 = $pdo->prepare("select * from estado where est_uf = '$estadoEmp_up' ");
$sth3->execute();
$estado_emp = $sth3->fetch(PDO::FETCH_ASSOC);
extract($estado_emp);
$est_edi = $estado_emp['est_id'];



$sth4 = $pdo->prepare("select * from cidade where cid_nome = '$cidadeEmp_up'");
$sth4->execute();
$cidade_emp = $sth4->fetch(PDO::FETCH_ASSOC);
extract($cidade_emp);
$cid_edi = $cidade_emp['cid_id'];
*/

/*

  if(is_int($estadoEmp_up)){

  $estado_Ups = $estadoEmp_up;

  }else if (is_string($estadoEmp_up)){


  $sth3 = $pdo->prepare("select * from estado where est_uf = '$estadoEmp_up' ");
  $sth3->execute();
  $estado_emp = $sth3->fetch(PDO::FETCH_ASSOC);
  extract($estado_emp);
  $estado_Ups = $estado_emp['est_id'];


  }

  if(is_int($cidadeEmp_up)){

  $cidade_Ups = $cidadeEmp_up;

  }else if (is_string($cidadeEmp_up)){


  $sth4 = $pdo->prepare("select * from cidade where cid_nome = '$estadoEmp_up' ");
  $sth4->execute();
  $cidade_emp = $sth4->fetch(PDO::FETCH_ASSOC);
  extract($cidade_emp);
  $cidade_Ups = $cidade_emp['cid_id'];


  }
 */

function validar_cnpj($cnpj_up) {
    $cnpj_up = preg_replace('/[^0-9]/', '', (string) $cnpj_up);
    if (strlen($cnpj_up) != 14)
        return false;
    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
        $soma += $cnpj_up{$i} * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    if ($cnpj_up{12} != ($resto < 2 ? 0 : 11 - $resto))
        return false;

    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
        $soma += $cnpj_up{$i} * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    return $cnpj_up{13} == ($resto < 2 ? 0 : 11 - $resto);
}

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

if (validar_cnpj($cnpj_up) == true) {

    $cnpj1 = str_replace("-", "", $cnpj_up);
    $cnpj2 = str_replace(".", "", $cnpj1);
    $cnpj3 = str_replace(".", "", $cnpj2);
    $cnpjForm = str_replace("/", "", $cnpj3);

    $result_usuario = "UPDATE empresa SET emp_cnpj='$cnpjForm',emp_representante='$representanteEmp_up', emp_razao='$razaoEmp_up',emp_email='$emailEmp_up',emp_senha='$senhaEmp_up',emp_estado='$estadoEmp_up',emp_cidade='$cidadeEmp_up'  WHERE emp_email='$Email_confirm' and emp_senha='$Senha_confirm' ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_affected_rows($conn)) {
        
         echo "<script>alert('Perfil atualizado com sucesso');window.location=\"../pags_emp/Perfil_emp.php\";</script> ";
        
    } else {
        
         echo "<script>alert('Erro ao atualizar perfil');window.location=\"../pags_emp/Perfil_emp.php\";</script> ";
        
    }
} else if (validar_cnpj($cnpj_up) == false) {

    echo "<script>alert('CPF Invalido!');window.location=\"../pags_emp/Perfil_emp.php\";</script> ";
}
?>