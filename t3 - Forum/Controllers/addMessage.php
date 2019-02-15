<?php 
require_once('conexao.php');
session_start();
$userId = $_SESSION['id'];
$topicId = $_POST['topicId']; 
$message = $_POST['message'];

$sql = 'INSERT INTO messages(user_id, topic_id, message) VALUES(:u, :t, :m)';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':u', $userId);
$queryOne->bindParam(':t', $topicId);
$queryOne->bindParam(':m', $message);
$queryOne->execute();
header('location: ../Views/topic.php?topicId='.$topicId);

?>