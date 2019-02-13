<?php
require_once('conexao.php');
$eventId = $_GET['eventId'];

$sql = 'DELETE FROM events WHERE id=:i';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':i', $eventId);
$queryOne->execute();
header('location: ../Views/index.php');
?>