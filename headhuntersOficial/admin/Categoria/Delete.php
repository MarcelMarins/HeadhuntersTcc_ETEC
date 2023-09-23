<?php

include_once '../../php/conexao2.php';

$cat_id = $_GET['cat_id'];

$sql = "DELETE FROM categoria WHERE cat_id=:cat_id";

$query = $pdo->prepare($sql);
$query->execute(array(':cat_id' => $cat_id));

echo "<script>alert('Os dados foram excluidos com sucesso');window.location=\"select.php\";</script>";
?>