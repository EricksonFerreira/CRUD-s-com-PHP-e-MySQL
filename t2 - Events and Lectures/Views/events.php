<?php 
require_once('../Controllers/conexao.php');
session_start();
if(!isset($_SESSION['id']) or !isset($_SESSION['user'])):
	header('location: login.php');
endif;
$user = $_SESSION['user'];
$userId = $_SESSION['id'];
$eventId = $_GET['eventId'];

$sql = 'SELECT * FROM events WHERE id=:e';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':e', $eventId);
$queryOne->execute();
$event = $queryOne->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM lectures WHERE event_id=:e';
$queryTwo = $conn->prepare($sql);
$queryTwo->bindParam(':e', $event['id']);
$queryTwo->execute();
$leactures = $queryTwo->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $event['event_title'];?></title>
</head>
<body>
<a href="../Controllers/logout.php">Sair da Conta</a>
	<center><h1><?= $event['event_title'];?></h1></center>
<a href="index.php">Voltar</a>
<?php 
	if($leactures != null): ?>	
		<h1>Palestras:</h2>
	<?php foreach ($leactures as $value): ?>
		<?= $value['lecture_title'];?>
		<?= $value['lecture_desc'];?>
		<?php if ($event['user_id'] == $userId): ?>
		<a href="../Controllers/rmLecture.php?lectureId=<?=$value['id'];?>&eventId=<?=$value['event_id'];?>" style="color: red;"><!-- &#10007; --> Apagar Palestra</a>			
		<?php endif ?>
		<hr>
<?php endforeach ?>
<?php endif; ?>
		<?php if ($event['user_id'] == $userId): ?>
		<form action="../Controllers/addLeacture.php?eventId=<?=$event['id'];?>" method="post">
			<label>Palestra:</label>
			<input type="text" name="title" placeholder="Adicionar Palestra">
			<label>Descrição:</label>
			<input type="text" name="desc" placeholder="Descrição da palestra">
			<input type="submit" value="Cadastrar Palestra">
		</form>
		<?php endif; ?>
</body>
</html>
