<?php
require_once('../Controllers/conexao.php');
session_start();
if(!isset($_SESSION['id']) or !isset($_SESSION['username'])):
	header('location: login.php');
endif;
if(!isset($_GET['topicId'])):
	header('location: index.php');
endif;
$userId = $_SESSION['id'];
$user = $_SESSION['username'];
$topicId = $_GET['topicId'];
//Pegar as informações do Tópico
$sql = 'SELECT * FROM topics WHERE id=:i';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':i', $topicId);
$queryOne->execute();
$stmt = $queryOne->fetchAll();
//Pegar as mensagens do Tópico
$sql2 = 'SELECT * FROM messages WHERE topic_id=:t';
$queryTwo = $conn->prepare($sql2);
$queryTwo->bindParam(':t', $topicId);
$queryTwo->execute();
$stmt2 = $queryTwo->fetchAll();
//Pegar o nome do Usuário que criou a mensagem
$sql3 = 'SELECT * FROM users WHERE id=:i';
$queryThree = $conn->prepare($sql3);
$queryThree->bindParam(':i', $userId);
$queryThree->execute();
$stmt3 = $queryThree->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Topic</title>
</head>
<body>
<?=$user;?> <a href="../Controllers/logout.php">Sair</a>
<br>
 <h1><?=$stmt[0]['title'];?></h1><a href="index.php">Back</a>
 <br>
 <br>
<?php 
foreach ($stmt2 as $message):  ?>
	<div class="message" style="border: 1px solid black; width: 300px;">
		<?=$message['message']; ?>
		<?php if ($message['user_id'] == $userId): ?>
			<a href="../Controllers/rmMessage.php?topicId=<?=$topicId;?>&messageId=<?=$message['id'];?>">
				Delete Mensagem
			</a>	
		<?php endif; ?>
		<br>
		<?php foreach ($stmt3 as $username): ?>
			<div class="text"><?=$username['username'];?></div>
		<?php endforeach; ?>
	</div>
<?php endforeach; ?>
	<div class="newmessage">
		<h2>Adicionar Mensagens:</h2>
		<form method="POST" action="../Controllers/addMessage.php">
			<input type="text" name="message" placeholder="Digite a Mensagem">
			<input type="hidden" name="topicId" value="<?=$topicId;?>">
			<input type="submit" value="Adicionar Mensagem">
		</form>
	</div>
</body>
</html>