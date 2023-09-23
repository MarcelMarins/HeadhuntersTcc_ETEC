<?php

include_once '../../php/conexao2.php';

$vid_id = $_GET['vid_id'];

$sql = "DELETE FROM video WHERE vid_id=:vid_id";

$query = $pdo->prepare($sql);
$query->execute(array(':vid_id' => $vid_id));

echo "<script>alert('Os dados foram excluidos com sucesso');window.location=\"select.php\";</script>";
?>