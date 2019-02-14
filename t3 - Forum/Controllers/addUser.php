<?php 
require_once('conexao.php');
$email = $_POST['email'];
$user = $_POST['user'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password == $password2):
	//Verifica se existe o nome de usuário
	$sql = 'SELECT * FROM users WHERE username=:u';
	$queryOne = $conn->prepare($sql);
	$queryOne->bindParam(":u", $user);
	$queryOne->execute();
	$stmt = $queryOne->fetchAll();
	echo "Nome já existe!";
	if ($queryOne->rowCount() < 1):
		//Verifica se existe o nome de email
		$sql2 = 'SELECT * FROM users WHERE email=:e';
		$queryTwo = $conn->prepare($sql2);
		$queryTwo->bindParam(":e", $email);
		$queryTwo->execute();
		$stmt2 = $queryTwo->fetchAll();
		echo " - E-mail já existe!";
		if($queryTwo->rowCount() < 1):
			//Adiciona os dados no banco
 			$sql3 = "INSERT INTO users(email,username,password) VALUES(:e,:u,:p)";
 			$queryThree = $conn->prepare($sql3); 
 			$queryThree->bindParam(":e", $email);
 			$queryThree->bindParam(":u", $user);
 			$queryThree->bindParam(":p", $password);
 			$queryThree->execute();
 			echo " - Tudo Certo";
 			 // header('location: ../Views/register.php');
		endif;
	endif;
else:
echo "As senhas estão diferentes";
endif;

?>