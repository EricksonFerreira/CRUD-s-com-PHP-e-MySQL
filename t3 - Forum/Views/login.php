<?php
session_start();
if(isset($_SESSION['id']) or isset($_SESSION['username'])):
	header('location: index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<link rel=stylesheet href="../Estilos/style.css">
</head>
<body>
	<!-- <center> -->
		<div class="f1">
			<h1>ENTRAR</h1>
			<form id="login", method="POST" action="../Controllers/auth.php">
				<label>Usuário:</label>
				<input type="text" name="username" placeholder="Digite o nome de Usuário"><br>
				<label>Senha:</label>
				<input type="password" name="password" placeholder="digite a sua senha"><br>
				<input type="submit" value="Entrar">
			</form><br>
			ou deseja <a href="register.php">CADASTRAR-SE</a>
		</div>
	<!-- </center> -->
</body>
</html>