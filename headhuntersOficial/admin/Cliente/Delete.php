<?php

include_once '../../php/conexao2.php';

$cli_id = $_GET['cli_id'];

$sql = "DELETE FROM cliente WHERE cli_id=:cli_id";

$query = $pdo->prepare($sql);
$query->execute(array(':cli_id' => $cli_id));

echo "<script>alert('Os dados foram excluidos com sucesso');window.location=\"select.php\";</script>";
?>