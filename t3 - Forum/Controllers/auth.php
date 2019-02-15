<?php 
require_once('conexao.php');
$username = $_POST['username'];
$password = $_POST['password'];

$sql = 'SELECT * FROM users WHERE username=:u and password=:p';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':u', $username);
$queryOne->bindParam(':p', $password);
$queryOne->execute();
$stmt = $queryOne->fetchAll();

if ($queryOne->rowCount() >= 1):
	session_start();
	$_SESSION['id'] = $stmt[0]['id'];
	$_SESSION['username'] = $username;
	header('location: ../Views/index.php');
else:
	echo "O usuário ou senha estão errado";
	echo "<hr>";
	echo "<a href=../Views/register.php>Registre-se</a><br>";
	echo "<a href=../Views/login.php>Entrar</a>";
endif;
?>