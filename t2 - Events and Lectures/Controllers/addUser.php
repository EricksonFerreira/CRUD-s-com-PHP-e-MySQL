<?php 
require_once('conexao.php');
$user= $_POST['user'];
$password= $_POST['password'];
$password2= $_POST['password2'];

if ($password == $password2):
	$sql1 = "SELECT * FROM users WHERE username=?";
	$queryOne = $conn->prepare($sql1);
	$queryOne->bindParam(1, $user);
	$queryOne->execute();

	$stmt = $queryOne->fetchAll();

	if ($queryOne->rowCount() > 1):   ?>
		<script type="text/javascript">
	        mensagem = "Já existe um usuário com esse nome cadastrado";
	        alert(mensagem);
	        window.location.href = "../Views/register.php";
	    </script> 
<?php
	else:
	$sql2 = "INSERT INTO users(username,password) VALUES(:u,:p)";
	$queryTwo=$conn->prepare($sql2);
	$queryTwo->bindParam(":u", $user);
	$queryTwo->bindParam(":p", $password);
	$queryTwo->execute(); ?>
		<script type="text/javascript">
	        mensagem = "Usuário cadastrado com sucesso";
	        alert(mensagem);
	        window.location.href = "../Views/login.php";
	    </script> 
<?php
	endif;
else: ?>
		<script type="text/javascript">
	        mensagem = "As Senhas estão diferentes";
	        alert(mensagem);
	        window.location.href = "../Views/register.php";
	    </script> 
<?php
endif
 ?>