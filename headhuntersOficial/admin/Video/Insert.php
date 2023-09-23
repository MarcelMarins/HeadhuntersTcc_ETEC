<?php
include '../../php/conexao2.php';

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_DEFAULT);
$subtitulo = filter_input(INPUT_POST, 'subtitulo', FILTER_DEFAULT);
$escola = filter_input(INPUT_POST, 'escola', FILTER_DEFAULT);
$orientador = filter_input(INPUT_POST, 'orientador', FILTER_DEFAULT);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_DEFAULT);
$equipe = filter_input(INPUT_POST, 'equipe', FILTER_DEFAULT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
$cliente = filter_input(INPUT_POST, 'cliente', FILTER_DEFAULT);
$link = filter_input(INPUT_POST, 'link', FILTER_DEFAULT);
if (isset($_FILES['imagem'])) {

    $dataForm = date('20y-m-d');
    
    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novo_nome = md5(time()) . $extensao;

    $diretorio = "../../img/thumb/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

    $sql_code = "INSERT INTO video (vid_id,vid_titulo,vid_subtit,vid_escola,vid_orientador,vid_cat_id,vid_equipe,vid_descricao,vid_cli_id,vid_dataenvio,vid_linkyt,vid_imagem) VALUES (NULL, '$titulo','$subtitulo','$escola','$orientador','$categoria','$equipe','$descricao','$cliente','$dataForm','$link','$novo_nome')";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O vídeo foi enviado com sucesso!');window.location=\"select.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"formvideo.php\";</script>";
    }
}
?>