        
<?php

include './conexao.php';

$cnpj = filter_input(INPUT_POST, 'emp_cnpj', FILTER_DEFAULT);
$representante = filter_input(INPUT_POST, 'emp_representante', FILTER_DEFAULT);
$razaoEmp = filter_input(INPUT_POST, 'emp_razao', FILTER_DEFAULT);
$emailEmp = filter_input(INPUT_POST, 'emp_email', FILTER_DEFAULT);
$senhaEmp = filter_input(INPUT_POST, 'emp_senha', FILTER_DEFAULT);
$estadoEmp = filter_input(INPUT_POST, 'emp_estado', FILTER_DEFAULT);
$cidadeEmp = filter_input(INPUT_POST, 'emp_cidade', FILTER_DEFAULT);
if (isset($_FILES['imagem'])) {

    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novo_nome = md5(time()) . $extensao;

    $diretorio = "../img/users/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

    function validar_cnpj($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        if (strlen($cnpj) != 14)
            return false;
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    if (validar_cnpj($cnpj) == true) {

        $cnpj1 = str_replace("-", "", $cnpj);
        $cnpj2 = str_replace(".", "", $cnpj1);
        $cnpj3 = str_replace(".", "", $cnpj2);
        $cnpjForm = str_replace("/", "", $cnpj3);



        $result_usuario = "INSERT INTO empresa (emp_cnpj,emp_representante,emp_razao,emp_email,emp_senha,emp_estado,emp_cidade,emp_imagem) VALUES ('$cnpjForm','$representante', '$razaoEmp','$emailEmp', '$senhaEmp','$estadoEmp', '$cidadeEmp', '$novo_nome')";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);



        echo "<script>alert('Você foi cadastrado com sucesso!');window.location=\"../pags/Login_emp.php\";</script> ";
    } else if (validar_cnpj($cnpj) == false) {


        echo "<script>alert('CPF Invalido!');window.location=\"Cadastro_emp.php\";</script> ";
    }
}
?>

