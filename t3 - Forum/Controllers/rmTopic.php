<?php 
require_once('conexao.php');
$topicId = $_GET['topicId'];

$sql = 'DELETE FROM topics WHERE id=?';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(1, $topicId);
$queryOne->execute();
header('location: ../Views/index.php');

 ?>