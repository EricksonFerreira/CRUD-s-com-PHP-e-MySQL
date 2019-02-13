<?php 
require_once('conexao.php');
$lectureId = $_GET['lectureId'];
$eventId = $_GET['eventId'];
$sql = 'DELETE FROM lectures WHERE id=:i';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(':i', $lectureId);
$queryOne->execute();
header('location: ../Views/events.php?eventId='.$eventId);
?>
<!-- <script type="text/javascript">
    window.location.href = "../Views/events.php?eventId=<?= $eventId;?>";
</script>  -->