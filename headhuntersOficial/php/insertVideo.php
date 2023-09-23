<?php

include "conexao2.php";

session_start();
if (isset($_SESSION['Login_usu_id'])) {
    /*
      $sth1 = $pdo->prepare('select * from cliente where cli_email = :session and cli_senha = :session1');
      $sth1->bindValue(":session", $_SESSION['Login_usu_id']['cli_email']);
      $sth1->bindValue(":session1", $_SESSION['Login_usu_id']['cli_senha']);
      $sth1->execute();
      $linha = $sth1->fetch(PDO::FETCH_ASSOC);
      extract($linha);
     */

    $sth2 = $pdo->prepare('select * from cliente where cli_id = :session');
    $sth2->bindValue(":session", $_SESSION['Login_usu_id']['cli_id']);
    $sth2->execute();
    $linha = $sth2->fetch(PDO::FETCH_ASSOC);
    extract($linha);

    $id_usu = $linha['cli_id'];



    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_DEFAULT);
    $subtitulo = filter_input(INPUT_POST, 'sub', FILTER_DEFAULT);
    $escola = filter_input(INPUT_POST, 'escola', FILTER_DEFAULT);
    $orientador = filter_input(INPUT_POST, 'orientador', FILTER_DEFAULT);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_DEFAULT);
    $linkyt = filter_input(INPUT_POST, 'linkyt', FILTER_DEFAULT);
    $desc = filter_input(INPUT_POST, 'desc', FILTER_DEFAULT);
    $equipe = filter_input(INPUT_POST, 'equipe', FILTER_DEFAULT);

    $novo_linkyt = str_replace("https://www.youtube.com/watch?v=", "", $linkyt);

    if (isset($_FILES['imagem'])) {

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
        $novo_nome = md5(time()) . $extensao;

        $diretorio = "../img/thumb/";
        $data = date('20y-m-d');

        $sql_code = "INSERT INTO video (vid_id, vid_titulo, vid_subtit, vid_escola, vid_orientador, vid_cat_id, vid_equipe, vid_descricao, vid_cli_id, vid_dataenvio, vid_linkyt, vid_imagem) VALUES (NULL, '$titulo', '$subtitulo', '$escola', '$orientador', '$categoria', '$equipe', '$desc', '$id_usu', '$data', '$novo_linkyt', '$novo_nome')";
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

        if ($pdo->query($sql_code)) {
            echo "<script>alert('O vídeo foi postado com sucesso');window.location=\"../pags_usu/projetos.php\";</script>";
        } else {
            echo "<script>alert('Dados incorretos');window.location=\"../pags_usu/upload.php\";</script>";
        }
    }

    echo 'Falhou';
}
?>