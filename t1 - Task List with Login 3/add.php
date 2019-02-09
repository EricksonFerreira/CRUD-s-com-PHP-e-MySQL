<?php 	
//conexão com o banco de dados
require_once('conexao.php');

//rebendo os valores enviados pelo metodo POST
$user = $_POST['user'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

//Condição para ver se as Senhas estão iguais
if ($password == $password2):
	//Consulta o banco
	$checking=("SELECT * FROM users WHERE username = ? ");
		$queryOne = $conn->prepare($checking);
		$queryOne->bindParam(1,$user);
		$queryOne -> execute();
		$stmt = $queryOne->fetchAll();

	if ($queryOne -> rowCount() > 1):
		?>
	    <script type="text/javascript">
	        mensagem = "Já existe um usuário com esse nome cadastrado";
	        alert(mensagem);
	        window.location.href = "register.php"; 
	    </script>
<?php	else:
		$sql = "INSERT INTO users(username, PASSWORD) VALUES(:u, :p)";
		$query = $conn->prepare($sql);
		$query->bindParam(':u',$user);
		$query->bindParam(':p',$password);
		$stmt = $query->execute();
		header('location: register.php');
	endif;
else:?>
		<script type="text/javascript">
	        mensagem = "As senhas estão diferentes";
	        alert(mensagem);
	        window.location.href = "register.php"; 
	    </script>
<?php
endif;
?>
