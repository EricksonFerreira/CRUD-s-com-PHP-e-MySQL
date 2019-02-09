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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head><body>
    <div id="content">
        <h1>Login</h1>
        <form id="login" action="auth.php" method="POST">
            <input type="text" name="user" placeholder="Usuario">
            <input type="password" name="password" placeholder="Senha">
            <input type="submit" value="Login">
    <a href="register.php">Cadastre-se</a>
    </div>
</body>
</html>