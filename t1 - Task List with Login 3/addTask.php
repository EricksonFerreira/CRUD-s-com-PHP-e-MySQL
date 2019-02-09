<?php 
require_once('conexao.php');
session_start();
$id = $_SESSION['id'];
$task = $_POST['task'];

$sql = "INSERT INTO tasks(user_id,task) VALUES(:i, :t)";
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':i', $id);
$queryOne->bindParam(':t', $task);
$queryOne->execute();
 header("location:index.php");
 ?>