<?php
require_once('../Controllers/conexao.php');
session_start();
if(!isset($_SESSION['id']) or !isset($_SESSION['user'])):
	header('location: login.php');
endif;
$userId = $_SESSION['id'];
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>
<a href="../Controllers/logout.php">Sair da Conta</a>
<h3>Eventos</h3>
<?php 
$sql = 'SELECT * FROM events';
$queryOne = $conn->prepare($sql);
$queryOne->execute();
foreach ($queryOne as $value): ?>
<ul>
	<?php if($userId == $value['user_id']):?>
	<li>
		<a href="events.php?eventId=<?= $value['id'];?>" style="color: black;"><?=$value['event_title'];?></a>
		<a href="../Controllers/rmEvent.php?eventId=<?=$value['id'];?>" style="color: red;">&#10007;</a>
	</li>
	<?php else: ?>
	<li>
		<a href="events.php?eventId=<?= $value['id'];?>" style="color: green;"><?=$value['event_title'];?></a>
	</li>
	<?php endif; ?>
</ul>
<?php endforeach; ?>
<h3>Cadastre um novo Evento:</h3>
<form method="Post" action="../Controllers/addEvent.php">
	<input type="text" name="event" placeholder="Digite o nome do Evento">
	<input type="submit" value="Cadastrar Evento">
</form>
</body>
</html>