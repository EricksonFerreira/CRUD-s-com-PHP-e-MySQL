<?php 
require_once('conexao.php');
$messageId = $_GET['messageId'];
$topicId = $_GET['topicId'];

$sql = 'DELETE FROM messages WHERE id=?';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(1, $messageId);
$queryOne->execute();
header('location: ../Views/topic.php?topicId='.$topicId);

 ?>