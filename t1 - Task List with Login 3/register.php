<?php
require_once("conexao.php");
session_start();
if(isset($_SESSION['id']) or isset($_SESSION['user'])):?>
    <script type="text/javascript">
        mensagem = "Você está logado"+"\n"+"Por isso irá ser redirecionado";
        alert(mensagem);
        window.location.href = "index.php"; 
    </script>
<?php endif;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head><body>
    <div id="content">
        <h1>Cadastre-se</h1>
        <form id="login" action="add.php" method="POST">
            <input type="text" name="user" placeholder="Usuario" value="123">
            <input type="password" name="password" placeholder="Senha" value="123">
            <input type="password" name="password2" placeholder="Repita a Senha" value="123">
            <input type="submit" value="Cadastre-se">
    </div>
</body>
</html>