<?php

include './conexao.php';

$nome = filter_input(INPUT_POST, 'cli_nome', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'cli_email', FILTER_DEFAULT);
$senha1 = filter_input(INPUT_POST, 'cli_senha', FILTER_DEFAULT);
$cpf = filter_input(INPUT_POST, 'cli_cpf', FILTER_DEFAULT);
$data = filter_input(INPUT_POST, 'cli_data_nasc', FILTER_DEFAULT);
$celular = filter_input(INPUT_POST, 'cli_celular', FILTER_DEFAULT);
$estado1 = filter_input(INPUT_POST, 'cli_id_estado', FILTER_DEFAULT);
$cidade1 = filter_input(INPUT_POST, 'cli_id_cidade', FILTER_DEFAULT);
$genero = filter_input(INPUT_POST, 'cli_id_genero', FILTER_DEFAULT);
if (isset($_FILES['imagem'])) {

    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novo_nome = md5(time()) . $extensao;

    $diretorio = "../img/users/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);


function validaCPF($cpf) {
 

    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

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




if (validaCPF($cpf) == true){
    
$cpf1 = str_replace("-", "", $cpf);
$cpfForm = str_replace(".", "", $cpf1);
    
$dataForm = implode("-",array_reverse(explode("/",$data)));

$celu1 = str_replace("-", "", $celular);
$celu2 = str_replace("(", "", $celu1);
$celuForm = str_replace(")", "", $celu2);




$result_usuario = "INSERT INTO cliente (cli_nome,cli_email,cli_senha,cli_cpf,cli_data_nasc,cli_celular,cli_id_estado,cli_id_cidade,cli_id_genero,cli_img) VALUES ('$nome', '$email','$senha1', '$cpfForm','$dataForm', '$celuForm','$estado1', '$cidade1', '$genero', '$novo_nome')";
$resultado_usuario = mysqli_query($conn, $result_usuario);


    
echo "<script>alert('Você foi cadastrado com sucesso!');window.location=\"../pags/Login_usu.php\";</script> " ;

}else if (validaCPF($cpf) == false){
    
        
echo "<script>alert('CPF Invalido!');window.location=\"../pags/Cadastro_usu.php\";</script> " ;
    
}


}


        
?>