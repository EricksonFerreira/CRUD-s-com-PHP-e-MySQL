<?php 
require_once('conexao.php');
session_start();
$id = $_SESSION['id'];
$title = $_POST['title'];
$date = date('Y-m-d h:i:s');

$sql = 'INSERT INTO topics(user_id, title, created_at) VALUES(:i, :t, :d)';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':i', $id);
$queryOne->bindParam(':t', $title);
$queryOne->bindParam(':d', $date);
$queryOne->execute();

header('location: ../Views/index.php');
?>