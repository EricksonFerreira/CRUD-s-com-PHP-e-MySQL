<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastre-se</title>
	<link rel="stylesheet" type="text/css" href="../Estilos/style.css">
</head>
<body>
	<div id="form1">
		<h1>Cadastre-se</h1>
		<form action="../Controllers/add.php" method="POST">
			<label>Usuário</label>
			<input type="text" name="user" placeholder="Usuário"><br>
			<label>Senha</label>
			<input type="password" name="password" placeholder="Digite a sua Senha"><br>
			<label>Repetição da Senha</label>
			<input type="password" name="password2" placeholder="Digite a sua Senha Novamente"><br>
			<input type="submit" value="Cadastrar">
		</form>
		<a href="login.php">Voltar ao Login</a>
	</div>
</body>
</html>