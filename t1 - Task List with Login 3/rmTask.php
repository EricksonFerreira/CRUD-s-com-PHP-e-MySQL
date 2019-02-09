<?php
require_once('conexao.php');
$idTask = $_GET['id'];

$sql = "DELETE FROM tasks WHERE id=?";
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(1, $idTask);
$queryOne->execute();
header('location:index.php');



?>