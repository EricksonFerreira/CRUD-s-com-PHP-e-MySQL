<?php 
require_once('../Controllers/conexao.php');
session_start();
if(!isset($_SESSION['id']) or !isset($_SESSION['username'])):
	header('location: login.php');
endif;
$userId = $_SESSION['id'];
$username = $_SESSION['username'];
//Lista os Tópicos
$sql = "SELECT * FROM topics";
$queryOne = $conn->prepare($sql);
$queryOne->execute();
$stmt = $queryOne->fetchAll();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>
	<?=$username;?> <a href="#">Sair</a><br><br>
	
	<?php foreach ($stmt as $topic): ?>
		<div class="topic" style="border: 1px solid black; width: 300px;">
			<h3><a href="topic.php?topicId=<?=$topic['id'];?>"><?=$topic['title'];?><a></h3>
<?php 		if ($userId == $topic['user_id']):?>
				<a href="../Controllers/rmTopic.php?topicId=<?=$topic['id'];?>">Deletar o Tópico</a>
<?php  		endif;

			//Pega no nome do usuário
			$sql2 = "SELECT * FROM users WHERE id=:i";
			$queryTwo = $conn->prepare($sql2);
			$queryTwo->bindParam(':i', $topic['user_id']);
			$queryTwo->execute();
			$stmt2 = $queryTwo->fetchAll();
			foreach ($stmt2 as $user):  ?>
			<p><?=$user['username'];?></p>
		<?php endforeach?>
		</div>
	<?php endforeach ?>
	<h2>Adicionar Tópico:</h2>
	<form id="newtopic" method="POST" action="../Controllers/addTopic.php">
		<input type="text" name="title" placeholder="Adicionar Tópico">
		<input type="submit" value="Adicionar">
	</form>
</body>
</html>