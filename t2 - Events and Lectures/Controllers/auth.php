<?php 
require_once('../Controllers/conexao.php');

$user = $_POST['user'];
$password = $_POST['password'];

$sql = 'SELECT * FROM users WHERE password=:p and username=:u';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':p',$password);
$queryOne->bindParam(':u',$user);
$queryOne->execute();

$stmt = $queryOne->fetchAll();

if($queryOne->rowCount() >= 1 ):
	session_start();
	$_SESSION['user'] = $user;
	$_SESSION['id'] = $stmt[0]['id'];
	header('location:../Views/index.php');
else: ?>
	<script type="text/javascript">
	        mensagem = "Senha ou usuário errados";
	        alert(mensagem);
	        window.location.href = "../Views/login.php";
	    </script> 
<?php 
endif;
?>