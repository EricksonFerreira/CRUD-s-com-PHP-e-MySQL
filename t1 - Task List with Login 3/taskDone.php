<?php 
require_once('conexao.php');
$id = $_GET['id'];

$sql = "UPDATE tasks SET done=1 WHERE id=".$id;
$queryOne = $conn->prepare($sql);
$queryOne->execute();
header('location:index.php');




 ?>