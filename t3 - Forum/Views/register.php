<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel=stylesheet href="../Estilos/style.css">
</head>
<body>
<!-- <center>		 -->
	<div class="f1">
		<h1>Cadastre-se</h1>
		<form id="register" method="post" action="../Controllers/addUser.php">
			<label>Email:</label>
			<input type="email" name="email" placeholder="Digite o seu email"><br>
			<label>Usuário:</label>
			<input type="text" name="user" placeholder="Digite o nome do seu Usuário"><br>
			<label>Senha:</label>
			<input type="password" name="password" placeholder="Digite a sua senha"><br>
			<label>Repita a sua Senha:</label>
			<input type="password" name="password2" placeholder="Repita a sua senha"><br>
			<input type="submit" value="Cadastrar-se">
		</form><br>
		Voltar ao menu <a href="login.php">ENTRAR</a>
	</div>
<!-- </center> -->
</body>
</html>