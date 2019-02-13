<?php 
require_once('../Controllers/conexao.php');
$eventId = $_GET['eventId'];
	$title = $_POST['title'];
	$description = $_POST['desc'];
$sql = 'INSERT INTO lectures(event_id, lecture_title, lecture_desc) VALUES(:e, :t, :d)';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam('e', $eventId);
$queryOne->bindParam('t', $title);
$queryOne->bindParam('d', $description);
$queryOne->execute();
header('location: ../Views/events.php?eventId='.$eventId);
?>
