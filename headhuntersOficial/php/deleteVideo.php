<?php

include_once 'conexao2.php';

$vid_id = $_GET['video_id'];

    $sql_code = "DELETE FROM video WHERE vid_id = $vid_id";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O vídeo foi deletado com sucesso!');window.location=\"../pags_usu/perfil_usu.php\";</script>";
    } else {
        echo "<script>alert('Dados incorretos');window.location=\"../pags_usu/perfil_usu.php\";</script>";
    }
    
    ?>