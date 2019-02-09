<?php
require_once("conexao.php");
session_start();
if(!isset($_SESSION['id']) or !isset($_SESSION['user'])):?>
    <script type="text/javascript">
        mensagem = "Você não efetuou o login"+"\n"+"Por isso irá ser redirecionado para a pagina de Login";
        alert(mensagem);
        window.location.href = "login.php"; 
    </script>
<?php 
endif;
$id = $_SESSION['id'];
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1>Minha lista de tarefas</h1>
    <p>Usuário: <?=$user;?>| <a class="logout" href="logout.php">Sair</a></p>
    <form action="addTask.php" method="POST" class="addtask">
        <table class="tasks">
            <tr>
                <th>Tarefa</th>
                <th>Ações</th>
            </tr>
<?php
        $sql = "SELECT * FROM tasks WHERE user_id=?";
        $queryOne = $conn->prepare("$sql");
        $queryOne->bindParam(1,$id);
        $queryOne->execute();
        foreach ($queryOne as $key => $value): 
?>          <tr class="task">
                <td class="<?= $value['done'] == 1 ? "done" : "todo"?>">
                    <?= $value['task']?>
                </td>                
                <td class="action">
                    <?php if ($value['done'] != 1):?>
                        <a class="taskdone" href="taskDone.php?id=<?=$value['id'];?>">&#10004;</a>
                    <?php endif;?>
                    <a class="rmtask" href="rmtask.php?id=<?=$value['id'];?>">&#10007;</a>
                </td>
            </tr>
<?php   endforeach; ?>
            <tr>
                <td>
                    <input type="text" name="task" placeholder="Tarefa" required>
                </td>
                <td class="action">
                    <input type="submit" value="ok">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>