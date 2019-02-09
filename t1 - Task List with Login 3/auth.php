<?php 
require_once('conexao.php');
$user = $_POST['user'];
$password = $_POST['password'];
 
$queryOne = $conn->prepare("SELECT * FROM users WHERE username=? and PASSWORD=?");
$queryOne->bindParam(1,$user);
$queryOne->bindParam(2,$password);
$queryOne->execute();
//pegando o id do usuario;
$dados = $queryOne->fetch();


$stmt = $queryOne->fetchAll();

if($queryOne -> rowCount() >= 1):
	session_start();
	$_SESSION['id'] = $dados['id'];
	$_SESSION['user'] = $user;
	 header('location:index.php');

else: ?>
	
		<script type="text/javascript">
			alert("Login ou Senha Incorretos");
			window.location.href = "login.php"		
</script>
<?php 
endif;
