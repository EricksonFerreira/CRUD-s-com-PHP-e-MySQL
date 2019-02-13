<?php
session_start();
if(isset($_SESSION['id']) or isset($_SESSION['user'])):
	header('location: index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel=stylesheet href="../Estilos/style.css">
</head>
<body>
	<div id="form1">
		<h1>Login</h1><br>
		<form action="../Controllers/auth.php" method="POST">
			<label>Usuário:</label>
			<input type="text" name="user" placeholder="Usuário"><br>
			<label>Senha:</label>
			<input type="password" name="password" placeholder="Senha"><br>
			<input type="submit" value="Entrar">
		</form>
		<a href="register.php">Cadastre-se</a>
	</div>
</body>
</html>