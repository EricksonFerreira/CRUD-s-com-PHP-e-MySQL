<?php 
require_once('../Controllers/conexao.php');
session_start();
$userId = $_SESSION['id']; 
$event = $_POST['event'];

$sql = 'INSERT INTO events(user_id, event_title) VALUES(:i,:e)';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':i', $userId);
$queryOne->bindParam(':e', $event);
$queryOne->execute();

header('location: ../Views/index.php');
// echo $userId;
?>